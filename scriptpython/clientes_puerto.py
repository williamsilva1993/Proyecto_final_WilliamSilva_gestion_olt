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
        time.sleep(1)
        canal.send("enable\n")
        time.sleep(1)
        canal.send(f"display ont info 0 {tarjeta} {puerto_tarj} all\n")
        time.sleep(1)
        canal.send("\n")
        # Repetir el envío del comando "c" 10 veces
        for _ in range(7):
            time.sleep(0.7)
            canal.send("c")

        resultado = canal.recv(65535).decode('utf-8')

        # Buscar la posición de "F/S/P ONT-ID Description"
        index = resultado.find("F/S/P   ONT-ID   Description")
        if index != -1:
            # Obtener el texto antes de "F/S/P ONT-ID Description"
            resultado = resultado[:index]

            # Eliminar las líneas de paginación y espacios adicionales
            resultado = resultado.replace("---- More ( Press 'Q' to break ) ----", "").strip()
            resultado = resultado.replace("\033[37D", "").strip()

            # Alinear los datos correctamente
            lineas = resultado.split('\n')
            resultado_formateado = []
            for linea in lineas:
                partes = linea.split()
                if len(partes) >= 7 and partes[0] != "F/S/P":
                    resultado_formateado.append({
                        "tarj": partes[0],
                        "puerto": partes[1],
                        "onu": partes[2],
                        "sn": partes[3],
                        "estado": partes[5],
                        "conf_estado": partes[6],
                        "match_estate": partes[7] if len(partes) > 7 else ""
                    })
            return resultado_formateado

    except Exception as e:
        return {"error": f"Error en la conexión SSH: {str(e)}"}

    finally:
        ssh.close()

direccion_ip_olt = sys.argv[1]
puerto_ssh = sys.argv[2]  # puerto SSH estándar
usuario_ssh = sys.argv[3]
contrasena_ssh = sys.argv[4]
tarjeta=sys.argv[5]
puerto_tarj=sys.argv[6]

resultado_conexion = conexion_olt(direccion_ip_olt, puerto_ssh, usuario_ssh, contrasena_ssh, tarjeta, puerto_tarj )

# Convertir el resultado a JSON
resultado_json = json.dumps(resultado_conexion)

print(resultado_json)