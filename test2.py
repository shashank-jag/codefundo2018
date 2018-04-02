#!/usr/bin/env python
import io
import os

# Imports the Google Cloud client library
from google.cloud import speech
from google.cloud.speech import enums
from google.cloud.speech import types
from test import phase2

# Instantiates a client
client = speech.SpeechClient()

# The name of the audio file to transcribe
file_name = os.path.join(
    os.path.dirname(__file__),
    'sample2.wav')

# Loads the audio into memory
with io.open(file_name, 'rb') as audio_file:
    content = audio_file.read()
    audio = types.RecognitionAudio(content=content)

config = types.RecognitionConfig(
    encoding=enums.RecognitionConfig.AudioEncoding.LINEAR16,
    language_code='hi-IN')

# Detects speech in the audio file
response = client.recognize(config, audio)

file = open("work","w")

for result in response.results:
    print('Transcript: {}'.format(result.alternatives[0].transcript))
    file.write('Transcript: {}'.format(result.alternatives[0].transcript))
    phase2(result.alternatives[0].transcript)
