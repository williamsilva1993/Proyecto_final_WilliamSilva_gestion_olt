import sys
import paramiko
import time
from tabulate import tabulate

def conexion_olt(direccion_ip, puerto, nombre_usuario, contrasena):
    ssh = paramiko.SSHClient()
    ssh.load_system_host_keys()
    ssh.set_missing_host_key_policy(paramiko.AutoAddPolicy())

    try:
        ssh.connect(direccion_ip, port=puerto, username=nombre_usuario, password=contrasena)
        canal = ssh.invoke_shell()
        time.sleep(0.5)
        canal.send("enable\n")
        time.sleep(1)
        canal.send("config\n")
        time.sleep(1)
        canal.send("display board 0\n")
        time.sleep(1)
        canal.send("\n")

        resultado = canal.recv(65535).decode('utf-8')

        lines = resultado.split('\n')
        start_index = None

        for i, line in enumerate(lines):
            if "SlotID" in line:
                start_index = i
                break

        if start_index is not None:
            # Buscamos el índice de la primera fila vacía desde el final
            end_index = len(lines) - 2
            while end_index >= 0 and lines[end_index].strip() == "":
                end_index -= 1

            extracted_result = "\n".join(lines[start_index+2:end_index]).strip()

            data = [line.split() for line in extracted_result.split('\n')]

            # Definir el ancho de las columnas
            headers = ["ID Ranura", "Nombre Tarjeta", "Estado", "Subtipo"]
            col_widths = {"ID Ranura": 10}  # Ajusta el ancho de SlotID según tus necesidades

            # Usamos disable_numparse para evitar que tabulate interprete los números y ajuste el ancho en función de ellos
            table = tabulate(data, headers=headers, tablefmt="pretty", colalign=("center",), disable_numparse=True)
            return table
        else:
            return "Comando '#display board 0' no encontrado en la salida."

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