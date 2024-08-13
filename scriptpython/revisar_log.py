import sys
import paramiko
import time

def conexion_olt(direccion_ip, puerto, nombre_usuario, contrasena):
    ssh = paramiko.SSHClient()
    ssh.load_system_host_keys()
    ssh.set_missing_host_key_policy(paramiko.AutoAddPolicy())

    try:
        ssh.connect(direccion_ip, port=puerto, username=nombre_usuario, password=contrasena)
        canal = ssh.invoke_shell()
        time.sleep(0.5)
        canal.send("enable\n")
        time.sleep(0.5)
        canal.send("display log all\n")
        time.sleep(0.5)
        canal.send("\n")
        time.sleep(0.7)

        # Repetir el envío del comando "c" 10 veces
        for _ in range(30):
            time.sleep(0.7)
            canal.send("c")

        resultado = canal.recv(65535).decode('utf-8')

        # Buscar la posición de "display log all"
        index = resultado.find("display log all")
        
        if index != -1:
            # Obtener el texto después de "display log all"
            resultado = resultado[index + len("display log all"):]


            # Eliminar las líneas de paginación y espacios adicionales
            resultado = resultado.replace("---- More ( Press 'Q' to break ) ----", "\n").strip()
            resultado = resultado.replace("\033[37D", "\n").strip()

            # Alinear los datos correctamente
            lineas = resultado.split('\n')
            resultado_formateado = ""
            for linea in lineas:
                partes = linea.split()
                if len(partes) > 6:
                    resultado_formateado += " ".join(partes[:7]) + "   " + " ".join(partes[7:]) + "\n"
                else:
                    resultado_formateado += linea + "\n"
            return resultado_formateado

    except Exception as e:
        return f"Error en la conexión SSH: {str(e)}"

    finally:
        ssh.close()

direccion_ip_olt = sys.argv[1]
puerto_ssh = sys.argv[2]  # puerto SSH estándar
usuario_ssh = sys.argv[3]
contrasena_ssh = sys.argv[4]

resultado_conexion = conexion_olt(direccion_ip_olt, puerto_ssh, usuario_ssh, contrasena_ssh)

print(resultado_conexion)