# Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
# SPDX-License-Identifier: MIT-0

from awscrt import io, mqtt, auth, http
from awsiot import mqtt_connection_builder
import time as t
import json
import mysql.connector
import time
import datetime

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="!1Password",
  database="mybimu",
  autocommit=True
)

id, device_mac, status = [], [], []
new_id, new_device_mac, new_status = [], [], []
clean_id, clean_mac = [], []
start_id, start_mac = [], []

def value():
    called = False
    global id
    global device_mac
    global status
    id = []
    device_mac = []
    status = []
    mycursor = mydb.cursor()
    mycursor.execute("SELECT id,device_mac,status FROM recipes")
    myresult = mycursor.fetchall()
    for x in myresult:
        id.append(x[0])
        device_mac.append(x[1])
        status.append(x[2])
    mycursor.close()

def new_value():
    global new_id
    global new_device_mac
    global new_status
    new_id = []
    new_device_mac = []
    new_status = []
    mycursor = mydb.cursor()
    mycursor.execute("SELECT id,device_mac,status FROM recipes")
    myresult = mycursor.fetchall()
    for x in myresult:
        new_id.append(x[0])
        new_device_mac.append(x[1])
        new_status.append(x[2])
    mycursor.close()

def clean_value():
    global clean_mac
    global clean_id
    clean_id = []
    clean_mac = []
    mycursor = mydb.cursor()
    mycursor.execute("SELECT id,device_mac FROM `commands` WHERE `command` = 'clean-bimu' AND `status` = 1")
    myresult = mycursor.fetchall()
    for x in myresult:
        clean_id.append(x[0])
        clean_mac.append(x[1])
    mycursor.close()

def update_clean(row_id, device_mac):
    mycursor = mydb.cursor()
    sql = "UPDATE `commands` SET `status` = 0, `updated_at` = current_timestamp WHERE `id` = %s AND `device_mac` = %s"
    val = (row_id, device_mac)
    mycursor.execute(sql, val)
    mydb.commit()

def start_value():
    global start_mac
    global start_id
    start_id = []
    start_mac = []
    mycursor = mydb.cursor()
    mycursor.execute("SELECT id,device_mac FROM `commands` WHERE `command` = 'start-bimu' AND `status` = 1")
    myresult = mycursor.fetchall()
    for x in myresult:
        start_id.append(x[0])
        start_mac.append(x[1])
    mycursor.close()

def update_start(row_id, device_mac):
    mycursor = mydb.cursor()
    sql = "UPDATE `commands` SET `status` = 0, `updated_at` = current_timestamp WHERE `id` = %s AND `device_mac` = %s"
    val = (row_id, device_mac)
    mycursor.execute(sql, val)
    mydb.commit()

def displayData():
    print("Default")
    for x in range(len(id)):
        print(str(id[x]) + "-" + str(device_mac[x]) + ":" + str(status[x]))

def displayDataNew():
    print("New")
    for x in range(len(new_id)):
        print(str(new_id[x]) + "-" + str(new_device_mac[x]) + ":" + str(new_status[x]))

def displayClean():
    print("Clean")
    for x in range(len(clean_id)):
        print(str(clean_id) + "-" + str(clean_mac))

def publish(device_mac, command, result):
    ENDPOINT = "a23jog5f3gqj1n-ats.iot.ap-southeast-2.amazonaws.com"
    CLIENT_ID = "testDevice"
    PATH_TO_CERT = "bimu_key/2b7232f8ce-certificate.pem.crt"
    PATH_TO_KEY = "bimu_key/2b7232f8ce-certificate.pem.key"
    PATH_TO_ROOT = "bimu_key/AmazonRootCA1.pem"
    TOPIC = "bimu/" + command + "/" + device_mac
    event_loop_group = io.EventLoopGroup(1)
    host_resolver = io.DefaultHostResolver(event_loop_group)
    client_bootstrap = io.ClientBootstrap(event_loop_group, host_resolver)
    mqtt_connection = mqtt_connection_builder.mtls_from_path(
                endpoint=ENDPOINT,
                cert_filepath=PATH_TO_CERT,
                pri_key_filepath=PATH_TO_KEY,
                client_bootstrap=client_bootstrap,
                ca_filepath=PATH_TO_ROOT,
                client_id=CLIENT_ID,
                clean_session=False,
                keep_alive_secs=6
                )

    connect_future = mqtt_connection.connect()
    connect_future.result()
    # print(TOPIC + " = " + json.dumps(result, indent=4, default=str, ensure_ascii=False).replace("\\","")[1:-1])
    mqtt_connection.publish(topic=TOPIC, payload=json.dumps(result, indent=4, default=str, ensure_ascii=False).replace("\\","")[1:-1], qos=mqtt.QoS.AT_LEAST_ONCE)
    t.sleep(0.1)
    disconnect_future = mqtt_connection.disconnect()
    disconnect_future.result()

value()

while True:
    find = 0
    time.sleep(10)
    new_value()
    clean_value()
    start_value()
    if len(id) != len(new_id):
        value()
    for x in range(len(id)):
        if(status[x] != new_status[x] and new_status[x] == 1):
            find = 1
            mycursor = mydb.cursor()
            sql = "SELECT * FROM recipes WHERE id = %s"
            adr = (str(new_id[x]),)
            mycursor.execute(sql, adr)
            row_headers = [x[0] for x in mycursor.description]  # this will extract row headers
            rv = mycursor.fetchall()
            for result in rv:
                json_data = "{\"recipe_name\": \"" + str(result[3]) + "\", \"fog1\": { \"duration\": \"" + str(result[4]) + "\", \"on\": \"" + str(result[5]) + "\", \"off\": \"" + str(result[6]) + "\", \"start\": \"" + str(datetime.timedelta(seconds=result[7].seconds)) + "\", \"end\": \"" + str(datetime.timedelta(seconds=result[8].seconds)) + "\" }, \"fog2\": { \"duration\": \"" + str(result[9]) + "\", \"on\": \"" + str(result[10]) + "\", \"off\": \"" + str(result[11]) + "\", \"start\": \"" + str(datetime.timedelta(seconds=result[12].seconds)) + "\", \"end\": \"" + str(datetime.timedelta(seconds=result[13].seconds)) + "\" }, \"light1\": { \"red\": \"" + str(result[14]) + "\", \"blue\": \"" + str(result[15]) + "\", \"green\": \"" + str(result[16]) + "\", \"white\": \"" + str(result[17]) + "\", \"bright\": \"" + str(result[18]) + "\", \"start\":\"" + str(datetime.timedelta(seconds=result[19].seconds)) + "\", \"end\": \"" + str(datetime.timedelta(seconds=result[20].seconds)) + "\"}, \"light2\": { \"red\": \"" + str(result[21]) + "\", \"blue\": \"" + str(result[22]) + "\", \"green\": \"" + str(result[23]) + "\", \"white\": \"" + str(result[24]) + "\", \"bright\": \"" + str(result[25]) + "\", \"start\":\"" + str(datetime.timedelta(seconds=result[26].seconds)) + "\", \"end\": \"" + str(datetime.timedelta(seconds=result[27].seconds)) + "\"}}"
                mac = result[1]
                publish(mac, "recipe", json_data)
    if find == 1:
        find = 0
        value()
    if len(clean_id) > 0:
        for x in range(len(clean_id)):
            json_data = "{\"command\":\"clean-bimu\"}"
            mac = clean_mac[x]
            publish(mac, "cmd", json_data)
            update_clean(clean_id[x], clean_mac[x])

    if len(start_id) > 0:
        for x in range(len(start_id)):
            json_data = "{\"command\":\"start-bimu\"}"
            mac = start_mac[x]
            publish(mac, "cmd", json_data)
            update_start(start_id[x], start_mac[x])
