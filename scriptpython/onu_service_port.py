import sys
import paramiko
import time

def conexion_olt(direccion_ip, puerto, nombre_usuario, contrasena,tarjeta, puerto_tarj, onu_id):
    ssh = paramiko.SSHClient()
    ssh.load_system_host_keys()
    ssh.set_missing_host_key_policy(paramiko.AutoAddPolicy())

    try:
        ssh.connect(direccion_ip, port=puerto, username=nombre_usuario, password=contrasena)
        canal = ssh.invoke_shell()
        time.sleep(0.5)
        canal.send("enable\n")
        time.sleep(0.7)
        canal.send(f"display service-port port 0/{tarjeta}/{puerto_tarj} ont {onu_id}\n")
        time.sleep(0.7)
        canal.send("\n")
        time.sleep(0.7)
        resultado = canal.recv(65535).decode('utf-8')

        # Buscar la posición de "display log all"
        index = resultado.find("enable")
        
        if index != -1:
            # Obtener el texto después de "display log all"
            resultado = resultado[index + len("enable"):]


            # Eliminar las líneas de paginación y espacios adicionales
            resultado = resultado.replace("---- More ( Press 'Q' to break ) ----", "\n").strip()
            resultado = resultado.replace("\033[37D", "\n").strip()
            

            # Alinear los datos correctamente
            lineas = resultado.split('\n')
            resultado_formateado = ""
            for linea in lineas:
                partes = linea.split()
                if len(partes) > 14:
                    resultado_formateado += " ".join(partes[:14]) + "   " + " ".join(partes[14:]) + "\n"
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
tarjeta=sys.argv[5]
puerto_tarj = sys.argv[6]
onu_id = sys.argv[7]

resultado_conexion = conexion_olt(direccion_ip_olt, puerto_ssh, usuario_ssh, contrasena_ssh,tarjeta, puerto_tarj,onu_id)

print(resultado_conexion)