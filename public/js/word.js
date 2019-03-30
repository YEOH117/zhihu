/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var EnglishWord=new Array("");
var id=0;
var num=0;
window.onbeforeunload = function(){
    if(typeof XMLHttpRequest !== 'undefined'){
        var xhr = new XMLHttpRequest();
    }else{
        var xhr = new ActiveXObject('Microsoft.XMLHttp');
    }
    xhr.open('get','updid/'+id);
    xhr.send(null);
}
 function upd(){
     //EnglishWord[0] == null
     if(EnglishWord.word == null || EnglishWord.word[0] == null){
         flag = false;
         if(typeof XMLHttpRequest !== 'undefined'){
            var xhr = new XMLHttpRequest();
        }else{
            var xhr = new ActiveXObject('Microsoft.XMLHttp');
        }
        xhr.onreadystatechange=function(){
            if(xhr.readyState == 4){
                EnglishWord = JSON.parse(xhr.responseText);
                //console.log(EnglishWord.word[0])
            }
        };
        xhr.open('get','upd/'+id,false);
        xhr.send(null);
    }
    if(EnglishWord.word[0] != null){
         //$('#danci').text(EnglishWord[0]);
        $('#danci').text(EnglishWord.word[0].text);
        $('.transl').text(EnglishWord.word[0].transl);
        $('#word').val('');
        //alert('keyup("'+next+'")')
        //$('#word').attr('onkeyup','keyup("'+EnglishWord[0].text+'")');
        $('#word').attr('onkeyup','keyup("'+EnglishWord.word[0].text+'")');
        for(x in EnglishWord.word){
            if(x >= 1){
                EnglishWord.word[x-1] = EnglishWord.word[x];
            }
            //console.log(x*1+1);
            if(EnglishWord.word[x*1+1] == null){
                id = EnglishWord.word[x].id;
                EnglishWord.word[x] = null;
                break;
            }
        }
        //console.log(EnglishWord.word[0]);
        //EnglishWord[EnglishWord.length]='\0';
     }
     
     //
     ++num;
     $('#num').text('本次已经打了'+num+'个字');
}
function keyup(word){
    var text = word;
    var len = text.length;          //单词的长度
    var iput = $('#word').val();    //获取输入内容
    var str = text.split('');       //切割单词
    var num = iput.length;        //输入的字符串长度     
    if(text.indexOf(iput)){
        //打错
        var sty ="<span class='red'>";
        for(i=0;i<len;i++){
            sty +=str[i];
        }
        sty +="</span>";
        $('#danci').html(sty);
    }else{
        //打对
        var sty ='';
        for(i=0;i<len;i++){
            if(i<num){
                sty += "<span class='blue'>" + str[i] + "</span>";
            }else{
                sty += str[i];
            }
        }
        $('#danci').html(sty);
        //全打对，播放读音
        if(len===num){
            var t = '<audio autoplay="autoplay"><source src="http://dict.youdao.com/dictvoice?audio='+text+'"type="audio/wav"/><source src="http://dict.youdao.com/dictvoice?audio='+text+'"type="audio/mpeg"/></audio>';
            $('.adio').html(t);
            //$('.adio').html('<audio autoplay="autoplay"><source src="http://dict.youdao.com/dictvoice?audio={$word}"' + 'type="audio/wav"/><source src="http://dict.youdao.com/dictvoice?audio={$word}" type="audio/mpeg"/></audio>');
            //执行更新单词函数
            upd();
        }

    }
}

