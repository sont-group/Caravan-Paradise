<?php

class Image
{
    public function ImgExplode($imagens)
    {
        $icone = explode(' * ', $imagens)[0];
        $local = explode(', ', explode(' * ', $imagens)[1]);
        $hotels = explode(', ', explode(' * ', $imagens)[2]);
        return array('icone' => $icone, 'local' => $local, 'hotels' => $hotels);
    }

    public function ImgImplode($icone, $local, $hotels)
    {
        $xlocal = implode(', ', $local);
        $xhotels = implode(', ', $hotels);
        $imagens = "$icone * $xlocal * $xhotels";
        return $imagens;
    }



    //Salva uma imagem com upload e retorna o link para o bd e src
    public function save($file, $url)
    {
        $tipo = $file['type'];
        $ext = explode('/', $tipo)[1];
        $tmp = $file['tmp_name'];
        $link = "$url.$ext";
        move_uploaded_file($tmp, $link);
        return $link;
    }

    //Salva um array de imagens com upload e retorna  vetor com os links para o bd e src
    public function saves($file, $url)
    {
        $tam = count($file['name']);

        for ($i = 0; $i < $tam; $i++) {
            $tipo[$i] = $file['type'][$i];
            $ext = explode('/', $tipo[$i])[1];
            $tmp[$i] = $file['tmp_name'][$i];
            $link[$i] = $url . $i . ".$ext";
            move_uploaded_file($tmp[$i], $link[$i]);
        }
        return $link;
    }

    //Cria links (e pastas) para imagens
    public function link($categoria, $nome)
    {
        if (!file_exists("imagens")) {
            mkdir("imagens", 0700);
        }
        if (!file_exists("imagens/$categoria")) {
            mkdir("imagens/$categoria", 0700);
        }
        if (!file_exists("imagens/$categoria/$nome")) {
            mkdir("imagens/$categoria/$nome", 0700);
        }
        $url = "imagens/$categoria/$nome";
        return $url;
    }
}
