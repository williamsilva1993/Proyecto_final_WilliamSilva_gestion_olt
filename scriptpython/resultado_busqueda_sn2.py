import paramiko
import time
import sys

def conexion_olt(direccion_ip, puerto, nombre_usuario, contrasena, sn):
    ssh = paramiko.SSHClient()
    ssh.load_system_host_keys()
    ssh.set_missing_host_key_policy(paramiko.AutoAddPolicy())

    try:
        ssh.connect(direccion_ip, port=puerto, username=nombre_usuario, password=contrasena)
        canal = ssh.invoke_shell()
        time.sleep(0.5)
        canal.send("enable\n")
        time.sleep(1)
        canal.send(f"display ont info by-sn {sn}\n")
        time.sleep(1)
        canal.send("c")
        time.sleep(0.5)

        resultado = canal.recv(65535).decode('utf-8')

        # Buscar la posición de "display ont info by-sn"
        index = resultado.find(f"display ont info by-sn {sn}")
        
        if index != -1:
            # Obtener el texto después de "display ont info by-sn"
            resultado = resultado[index + len("enable"):]

            # Eliminar las líneas de paginación y espacios adicionales
            resultado = resultado.replace("---- More ( Press 'Q' to break ) ----", "\n").strip()
            resultado = resultado.replace("\033[37D", "\n").strip()

            # Eliminar líneas en blanco
            lineas = resultado.split('\n')
            lineas = [linea for linea in lineas if linea.strip()]

            # Filtrar las líneas hasta "Interoperability-mode"
            for i, linea in enumerate(lineas):
                if "Interoperability-mode" in linea:
                    # Truncar a partir de esta línea (incluyéndola)
                    lineas = lineas[:i+1]
                    break

            resultado_formateado = "\n".join(lineas)

            return resultado_formateado

    except Exception as e:
        return f"Error en la conexión SSH: {str(e)}"

    finally:
        ssh.close()

if __name__ == "__main__":
    direccion_ip_olt = sys.argv[1]
    puerto_ssh = int(sys.argv[2])  # puerto SSH estándar
    usuario_ssh = sys.argv[3]
    contrasena_ssh = sys.argv[4]
    sn = sys.argv[5]

    resultado_conexion = conexion_olt(direccion_ip_olt, puerto_ssh, usuario_ssh, contrasena_ssh, sn)

    print(resultado_conexion)