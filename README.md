# WHMCS Kupon Kodu

Bulutfon WHMCS kupon kodu scripti satış ortaklarının WHMCS kullanıcıları arasında kupon kodlarını dağıtması için yapılmıştır. Bu script MySQL kullanmadan json formatında bir dosya üzerinden kupon kodlarını userid'ler ile eşler. Bu sayede tek kullanımlık kupon kodlarının yanlışlıkla birden fazla kullanıcıya verilmesinin önüne geçilmiş olduğu gibi, kupon kodlarını dağıtırken de satış ortaklarına kolaylık sağlamaktadır.

## Kurulum

### 1. Aşama

Repo'da WHMCS klasöründe bulunan bulutfon.php isimli dosya indirim kuponlarını kullanıcıya özel dağıtan scripttir.  Bu script üzerinde değiştirilmesi gereken bölümlerde description girilmiştir.
bu dosya WHMCS yazılımının çalıştığı dizine upload edilmelidir.

### 2. Aşama

Bulutfon'dan aldığınız indirim kuponlarını json formatına çevirmek için repo'da ana dizinde bulunan coupontojson.sh bash script dosyasını kullanabilirsiniz. Bulutfon indirim kuponlarını bir dosyaya sıralı şekilde yazdıktan sonra "sh coupontojson.sh dosyaadi.txt" şeklinde komut vererek dosyanın çalıştığı dizinde json formatındaki bulutfon.json dosyasına ulaşabilirsiniz.