import urllib.request
import urllib.parse
import base64
import codecs
import sys
sys.stdout = codecs.getwriter("utf-8")(sys.stdout.detach())
class Bing(object):
    def __init__(self):
        self.url = "http://api.microsofttranslator.com/v2/ajax.svc/TranslateArray2?"

    def translate(self, from_lan, to_lan,content,):
        data = {}
        data['from'] = '"' + from_lan + '"'
        data['to'] = '"' + to_lan + '"'
        data['texts'] = '["'
        data['texts'] += content
        data['texts'] += '"]'
        data['options'] = "{}"
        data['oncomplete'] = 'onComplete_3'
        data['onerror'] = 'onError_3'
        data['_'] = '1430745999189'
        data = urllib.parse.urlencode(data).encode('utf-8')
        strUrl = self.url + data.decode() + "&appId=%223DAEE5B978BA031557E739EE1E2A68CB1FAD5909%22"
        response = urllib.request.urlopen(strUrl)
        str_data = response.read().decode('utf-8')
        return str_data

if __name__ == '__main__':
    rc_lang = sys.argv[1]
    dst_lang = sys.argv[2]
    text = sys.argv[3]
    content=decoded_text = base64.b64decode(text).decode('utf-8')
    bing=Bing()
    print(bing.translate(sys.argv[1], sys.argv[2],content))
