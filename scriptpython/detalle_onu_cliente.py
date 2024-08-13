import sys
import paramiko
import time

def conexion_olt(direccion_ip, puerto, nombre_usuario, contrasena, tarjeta, puerto_tarj, onu_id):
    ssh = paramiko.SSHClient()
    ssh.load_system_host_keys()
    ssh.set_missing_host_key_policy(paramiko.AutoAddPolicy())

    try:
        ssh.connect(direccion_ip, port=puerto, username=nombre_usuario, password=contrasena)
        canal = ssh.invoke_shell()
        time.sleep(1)
        canal.send("enable\n")
        time.sleep(1)
        canal.send("config\n")
        time.sleep(1)
        canal.send(f"interface gpon 0/{tarjeta}\n")
        time.sleep(1)
        canal.send(f"display ont info {puerto_tarj} {onu_id}\n")
        time.sleep(1)
        canal.send("\n")
        time.sleep(0.5)
        canal.send("\n")
        time.sleep(0.5)
        canal.send("\n")
        time.sleep(0.5)
        canal.send("q")
        time.sleep(0.7)
   

        resultado = canal.recv(65535).decode('utf-8')

        # Buscar la posición de "display log all"
        index = resultado.find(f"interface gpon 0/{tarjeta}")
        
        if index != -1:
            # Obtener el texto después de "display log all"
            resultado = resultado[index + len(f"interface gpon 0/{tarjeta}"):]


            # Eliminar las líneas de paginación y espacios adicionales
            resultado = resultado.replace("---- More ( Press 'Q' to break ) ----", "\n").strip()
            resultado = resultado.replace("\033[37D", "\n").strip()

            # Eliminar líneas en blanco
            lineas = resultado.split('\n')
            lineas = [linea for linea in lineas if linea.strip()]

            resultado_formateado = "\n".join(lineas)

            return resultado_formateado

    except Exception as e:
        return f"Error en la conexión SSH: {str(e)}"

    finally:
        ssh.close()

direccion_ip_olt = sys.argv[1]
puerto_ssh = sys.argv[2]  # puerto SSH estándar
usuario_ssh = sys.argv[3]
contrasena_ssh = sys.argv[4]
tarjeta=sys.argv[5]
puerto_tarj = sys.argv[6]
onu_id = sys.argv[7]

resultado_conexion = conexion_olt(direccion_ip_olt, puerto_ssh, usuario_ssh, contrasena_ssh, tarjeta, puerto_tarj, onu_id)

print(resultado_conexion)