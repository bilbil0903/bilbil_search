# 导入必要的模块
from googletrans import Translator
import base64
import codecs
import sys

# 将标准输出流的默认编码设置为 UTF-8
sys.stdout = codecs.getwriter("utf-8")(sys.stdout.detach())

# 提取命令行参数
src_lang = sys.argv[1]
dst_lang = sys.argv[2]
text = sys.argv[3]

# 将 Base64 编码的字符串解码成原始文本
decoded_text = base64.b64decode(text).decode('utf-8')

# 调用 Google 翻译 API 进行翻译
translator = Translator()
translation_result = translator.translate(decoded_text, src=src_lang, dest=dst_lang)
print(translation_result.text)
