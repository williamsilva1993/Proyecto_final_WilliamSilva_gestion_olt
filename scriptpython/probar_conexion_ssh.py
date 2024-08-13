import sys
import paramiko

def verificar_conexion_ssh(direccion_ip, puerto, nombre_usuario, contrasena):
    ssh = paramiko.SSHClient()
    ssh.load_system_host_keys()
    ssh.set_missing_host_key_policy(paramiko.AutoAddPolicy())

    try:
        ssh.connect(direccion_ip, port=puerto, username=nombre_usuario, password=contrasena)
        return "Conectado a la OLT exitosamente."
    except paramiko.AuthenticationException:
        return "Error en la autenticación SSH: Usuario o contraseña incorrectos."
    except paramiko.SSHException as e:
        return f"Error al conectarse por SSH: {str(e)}"
    except Exception as e:
        return f"No se puede conectar a la OLT. Revisa la OLT. Detalles: {str(e)}"
    finally:
        ssh.close()

# Verificar que se hayan proporcionado suficientes argumentos
if len(sys.argv) < 5:
    print("Uso: script.py <direccion_ip> <puerto_ssh> <usuario_ssh> <contrasena_ssh>")
    sys.exit(1)

# Asignar los argumentos a las variables correspondientes
direccion_ip_olt = sys.argv[1]
puerto_ssh = int(sys.argv[2])  # Convertir a entero
usuario_ssh = sys.argv[3]
contrasena_ssh = sys.argv[4]

# Llamar a la función para verificar la conexión y obtener el resultado
resultado_conexion = verificar_conexion_ssh(direccion_ip_olt, puerto_ssh, usuario_ssh, contrasena_ssh)

# Imprimir el resultado de la conexión
print(resultado_conexion)