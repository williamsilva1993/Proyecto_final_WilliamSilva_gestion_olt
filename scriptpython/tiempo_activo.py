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
        canal.send("display sysuptime\n")
        time.sleep(0.5)
        canal.send("\n")

        resultado = canal.recv(65535).decode('utf-8')
        lines = resultado.split('\n')

        software_info = [line.strip() for line in lines if "Huawei Integrated Access Software" in line]
        uptime_info = [line.strip() for line in lines if "System up time:" in line]

        return "\n".join(software_info) + "\n" + "\n".join(uptime_info)

    except Exception as e:
        return f"Error en la conexión SSH: {str(e)}"

    finally:
        ssh.close()

direccion_ip_olt = sys.argv[1]
puerto_ssh = sys.argv[2]  # puerto SSH estándar
usuario_ssh = sys.argv[3]
contrasena_ssh = sys.argv[4]

resultado_conexion = conexion_olt(direccion_ip_olt, puerto_ssh, usuario_ssh, contrasena_ssh)

resultado_conexion = resultado_conexion.replace("Huawei Integrated Access Software", "Software de Acceso Integrado Huawei")
resultado_conexion = resultado_conexion.replace("System up time:", "Tiempo de actividad del sistema:")

print(resultado_conexion)
