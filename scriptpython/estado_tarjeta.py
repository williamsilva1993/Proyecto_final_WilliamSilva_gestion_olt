import sys
import paramiko
import time
import json

def conexion_olt(direccion_ip, puerto, nombre_usuario, contrasena, slot):
    ssh = paramiko.SSHClient()
    ssh.load_system_host_keys()
    ssh.set_missing_host_key_policy(paramiko.AutoAddPolicy())

    try:
        ssh.connect(direccion_ip, port=puerto, username=nombre_usuario, password=contrasena)
        canal = ssh.invoke_shell()
        time.sleep(0.5)
        canal.send(f"display board 0/{slot}\n")
        time.sleep(1)
        canal.send("\n")
        time.sleep(1)

        # Repetir el envío del comando "c" 10 veces
        for _ in range(2):
            time.sleep(1)
            canal.send("c")

        resultado = canal.recv(65535).decode('utf-8')

        # Buscar la posición de "display board 0/0"
        index = resultado.find(f"display board 0/{slot}")
        if index != -1:
            # Obtener el texto después de "display board 0/0"
            resultado = resultado[index + len(f"display board 0/{slot}"):]

            # Eliminar las líneas de paginación y espacios adicionales
            resultado = resultado.replace("---- More ( Press 'Q' to break ) ----", "").strip()
            resultado = resultado.replace("\033[37D", "").strip()

            # Alinear los datos correctamente
            lineas = resultado.split('\n')
            resultado_formateado = []
            for linea in lineas:
                partes = linea.split()
                if len(partes) == 5:
                    resultado_formateado.append({
                        "port": partes[0],
                        "type": partes[1],
                        "mindistance": partes[2],
                        "maxdistance": partes[3],
                        "status": partes[4]
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
slot=sys.argv[5]

resultado_conexion = conexion_olt(direccion_ip_olt, puerto_ssh, usuario_ssh, contrasena_ssh, slot)

# Convertir el resultado a JSON
resultado_json = json.dumps(resultado_conexion)

print(resultado_json)
