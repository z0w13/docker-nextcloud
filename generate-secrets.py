#!/usr/bin/env python3

import secrets
import string

ID_CHARS = string.ascii_lowercase + string.digits
SECRET_CHARS = string.ascii_letters + string.digits + "/+"

def rand_string(length, chars):
    return ''.join(secrets.choice(chars) for _ in range(length))

print("NEXTCLOUD_INSTANCE_ID=oc%s" % rand_string(10, ID_CHARS))
print("NEXTCLOUD_SECRET_ID=%s" % rand_string(48, SECRET_CHARS))
print("NEXTCLOUD_PASSWORD_SALT=%s" % rand_string(30, SECRET_CHARS))
