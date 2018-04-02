#!/usr/bin/python
import time

subscription_key = "2d70ac6a202942b69abc39103fd7ebd6"

vision_analyze_url = "https://southeastasia.api.cognitive.microsoft.com/vision/v1.0/analyze"
# image_url = "https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/Broadway_and_Times_Square_by_night.jpg/450px-Broadway_and_Times_Square_by_night.jpg"

import sys
image_data = open(sys.argv[1], "rb").read()

import requests
headers  = {'Ocp-Apim-Subscription-Key': subscription_key ,
			"Content-Type": "application/octet-stream"}
params   = {'visualFeatures': 'Categories,Description,Color'}
data     = {'url': image_data}
print(image_data)
response = requests.post(vision_analyze_url, headers=headers, params=params, data=image_data)
response.raise_for_status()

#analysis      = response.json()
#image_caption = analysis["description"]["captions"][0]["text"].capitalize()
#time.sleep(20)

print("hi");