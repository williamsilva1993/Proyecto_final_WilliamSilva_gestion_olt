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
        canal.send("reboot system\n")
        time.sleep(0.5)
        canal.send("y\n")
        time.sleep(0.5)
        canal.send("\n")

        # Si llegamos a este punto sin excepciones, asumimos que el reinicio fue exitoso
        return "Reinicio de la OLT fue exitoso. Vuelve a conectarte en 5 minutos."

    except Exception as e:
        return f"Error al intentarse conectar a la OLT SSH: {str(e)}"

    finally:
        ssh.close()

direccion_ip_olt = sys.argv[1]
puerto_ssh = int(sys.argv[2])  # puerto SSH estándar
usuario_ssh = sys.argv[3]
contrasena_ssh = sys.argv[4]

resultado_conexion = conexion_olt(direccion_ip_olt, puerto_ssh, usuario_ssh, contrasena_ssh)

print(resultado_conexion)