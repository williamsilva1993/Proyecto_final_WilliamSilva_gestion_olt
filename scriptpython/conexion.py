from pysnmp.hlapi import *

# Función para obtener el valor del OID de CPU
def get_cpu_usage(snmp_target, community, oid_cpu):
    errorIndication, errorStatus, errorIndex, varBinds = next(
        getCmd(SnmpEngine(),
               CommunityData(community),
               UdpTransportTarget((snmp_target, 161)),
               ContextData(),
               ObjectType(ObjectIdentity(oid_cpu)))
    )

    if errorIndication:
        print(errorIndication)
    elif errorStatus:
        print(f'{errorStatus.prettyPrint()} at {errorIndex and varBinds[int(errorIndex)-1][0] or "?"}')
    else:
        for varBind in varBinds:
            print(f'{varBind[0].prettyPrint()} = {varBind[1].prettyPrint()}')

# Dirección IP de tu OLT
snmp_target = '172.11.18.254'  # Cambia esto por la IP de tu OLT

# Comunidad SNMP (por defecto es 'public', asegúrate de cambiarlo si usas otra)
community = 'public'

# OID de la CPU para Huawei
oid_cpu = '1.3.6.1.4.1.2011.6.3.4.1.9'  # Prueba con este OID, o cámbialo por el correcto para tu OLT

# Llamada a la función para obtener el uso de la CPU
get_cpu_usage(snmp_target, community, oid_cpu)