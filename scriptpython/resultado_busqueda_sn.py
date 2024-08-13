import sys
import paramiko
import time
import json

def conexion_olt(direccion_ip, puerto, nombre_usuario, contrasena, sn):
    ssh = paramiko.SSHClient()
    ssh.load_system_host_keys()
    ssh.set_missing_host_key_policy(paramiko.AutoAddPolicy())

    try:
        # Conectar a la OLT
        ssh.connect(direccion_ip, port=int(puerto), username=nombre_usuario, password=contrasena)
        canal = ssh.invoke_shell()
        time.sleep(3)

        # Enviar comandos para obtener la información de la ONT por número de serie
        canal.send("enable\n")
        time.sleep(2)
        canal.send(f"display ont info by-sn {sn}\n")
        time.sleep(2)  # Aumentar el tiempo si es necesario

        # Leer el resultado del comando
        resultado = canal.recv(65535).decode('utf-8')

        # Procesar el resultado
        index = resultado.find(f"display ont info by-sn {sn}")
        if index != -1:
            resultado = resultado[index + len(f"display ont info by-sn {sn}"):]

            # Eliminar las líneas de paginación y caracteres especiales
            resultado = resultado.replace("---- More ( Press 'Q' to break ) ----", "").strip()
            resultado = resultado.replace("\033[37D", "").strip()
            resultado = resultado.replace("\x1b[0m", "").strip()

            # Parsear las líneas relevantes de la salida
            lineas = resultado.split('\n')
            datos_extraidos = {}

            for linea in lineas:
                # Buscar la línea que contiene 'F/S/P' y extraer los valores
                if 'F/S/P' in linea:
                    partes = linea.split()
                    fsp = partes[-1]  # Supongamos que está al final de la línea
                    slot, tarjeta, puerto = fsp.split('/')
                    datos_extraidos['slot'] = slot
                    datos_extraidos['tarjeta'] = tarjeta
                    datos_extraidos['puerto'] = puerto

                if 'ONT-ID' in linea:
                    partes = linea.split()
                    datos_extraidos['ONT-ID'] = partes[-1]

                if 'Run state' in linea:
                    partes = linea.split()
                    datos_extraidos['Run state'] = partes[-1]

                #if 'Memory' in linea:
                    partes = linea.split()
                    datos_extraidos['Memory'] = partes[-1]

                #if 'CPU' in linea:
                    partes = linea.split()
                    datos_extraidos['CPU'] = partes[-1]

                #if 'Temperature' in linea:
                    partes = linea.split()
                    datos_extraidos['Temperature'] = partes[-1]

                if 'SN' in linea:
                    partes = linea.split()
                    datos_extraidos['SN'] = partes[-1]

                if 'Description' in linea:
                    datos_extraidos['Description'] = linea.split(':')[-1].strip()
                    

              #  if 'last down cause' in linea:
               #     datos_extraidos['last down cause'] = linea.split(':')[-1].strip()

                #if 'last up time' in linea:
                 #   datos_extraidos['last up time'] = linea.split(':')[-1].strip()

                #if 'last down time' in linea:
                 #   datos_extraidos['last down time'] = linea.split(':')[-1].strip()

                #if 'last dying gasp time' in linea:
                 #   datos_extraidos['last dying gasp time'] = linea.split(':')[-1].strip()

            if not datos_extraidos:
                datos_extraidos['error'] = "No se encontró información relevante en la salida."

            return datos_extraidos

        else:
            return {"error": "No se encontró información para el SN proporcionado."}

    except Exception as e:
        return {"error": f"Error en la conexión SSH: {str(e)}"}

    finally:
        ssh.close()

if __name__ == "__main__":
    # Obtener argumentos de la línea de comandos
    direccion_ip_olt = sys.argv[1]
    puerto_ssh = sys.argv[2]
    usuario_ssh = sys.argv[3]
    contrasena_ssh = sys.argv[4]
    sn = sys.argv[5]

    # Ejecutar la conexión y obtener el resultado
    resultado_conexion = conexion_olt(direccion_ip_olt, puerto_ssh, usuario_ssh, contrasena_ssh, sn)

    # Convertir el resultado a JSON y imprimirlo
    resultado_json = json.dumps(resultado_conexion, indent=4)
    print(resultado_json)