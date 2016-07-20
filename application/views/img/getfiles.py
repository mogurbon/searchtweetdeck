import urllib2
response = urllib2.urlopen('http://layout.jquery-dev.com/demos/img/')
html = response.read()
print html