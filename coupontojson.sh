#!/bin/bash
file=$1
if [ ! -f $file ]; then
    echo "Dosya Bulunamadı!"
fi
json="[" > bulutfon.json
for i in $(cat $file);do
    if [[ $i =~ ^([A-Z0-9]){12}$ ]]; then
        json+="{\"userid\":\"null\",\"key\":\"$i\"},"
    else
        echo "$i hatali bir kupon kodudur."
    fi
done
json=${json%?}
json+="]"
echo $json >> bulutfon.json

