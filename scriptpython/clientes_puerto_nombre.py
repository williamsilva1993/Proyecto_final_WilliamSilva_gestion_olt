import sys
import paramiko
import time
import json

def conexion_olt(direccion_ip, puerto, nombre_usuario, contrasena, tarjeta, puerto_tarj):
    ssh = paramiko.SSHClient()
    ssh.load_system_host_keys()
    ssh.set_missing_host_key_policy(paramiko.AutoAddPolicy())

    try:
        ssh.connect(direccion_ip, port=puerto, username=nombre_usuario, password=contrasena)
        canal = ssh.invoke_shell()
        time.sleep(0.7)
        canal.send("enable\n")
        time.sleep(0.7)
        canal.send(f"display ont info 0 {tarjeta} {puerto_tarj} all\n")
        time.sleep(0.7)
        canal.send("\n")
        time.sleep(0.7)

        # Repetir el envío del comando "c" 10 veces
        for _ in range(10):
            time.sleep(0.7)
            canal.send("c")

        resultado = canal.recv(65535).decode('utf-8')

        # Buscar la posición de "F/S/P ONT-ID Description"
        index = resultado.find("F/S/P   ONT-ID   Description")
        if index != -1:
            # Obtener el texto después de "F/S/P ONT-ID Description"
            resultado = resultado[index + len("F/S/P   ONT-ID   Description"):]

            # Eliminar las líneas de paginación y espacios adicionales
            resultado = resultado.replace("---- More ( Press 'Q' to break ) ----", "").strip()
            resultado = resultado.replace("\033[37D", "").strip()

            # Separar las líneas en una lista
            lineas = resultado.split('\n')

            # Crear una lista de diccionarios para almacenar los datos
            datos_ont = []

            # Iterar sobre las líneas y extraer los datos
            for linea in lineas:
                partes = linea.split()
                if len(partes) >= 4:
                    tarj_puerto,puerto, onu_id, *descripcion = partes
                    descripcion = ' '.join(descripcion)
                    datos_ont.append({
                        "tarj_puerto": tarj_puerto,
                        "puerto":puerto,
                        "onu_id": onu_id,
                        "descripcion": descripcion
                    })

            return datos_ont

    except Exception as e:
        return {"error": f"Error en la conexión SSH: {str(e)}"}

    finally:
        ssh.close()

# Obtener los argumentos de la línea de comandos
direccion_ip_olt = sys.argv[1]
puerto_ssh = int(sys.argv[2])  # Convertir el puerto a entero
usuario_ssh = sys.argv[3]
contrasena_ssh = sys.argv[4]
tarjeta = sys.argv[5]
puerto_tarj = sys.argv[6]

# Llamar a la función para obtener los datos de la OLT
resultado_conexion = conexion_olt(direccion_ip_olt, puerto_ssh, usuario_ssh, contrasena_ssh, tarjeta, puerto_tarj)

# Convertir el resultado a JSON
resultado_json = json.dumps(resultado_conexion)

print(resultado_json)