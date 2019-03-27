/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var EnglishWord=new Array("audi","english","volvo");;
 function upd(){
     if(EnglishWord[0] == null){
//         if(typeof XMLHttpRequest !== 'undefined'){
//            var xhr = new XMLHttpRequest();
//        }else{
//            var xhr = new ActiveXObject('Microsoft.XMLHttp');
//        }
//        xhr.onreadystatechange=function(){
//            if(xhr.readyState == 4){
//                eval("var next="+xhr.responseText);
//                $('#danci').text(next.text);
//                $('.transl').text(next.transl);
//                $('#word').val('');
//                //alert('keyup("'+next+'")')
//                $('#word').attr('onkeyup','keyup("'+next.text+'")');
//            }
//        };
//        xhr.open('get','upd');
//        xhr.send(null);
alert(1);
     }else{
         $('#danci').text(EnglishWord[0]);
        //$('#danci').text(EnglishWord[0].text);
        //$('.transl').text(EnglishWord[0].transl);
        $('#word').val('');
        //alert('keyup("'+next+'")')
        //$('#word').attr('onkeyup','keyup("'+EnglishWord[0].text+'")');
        $('#word').attr('onkeyup','keyup("'+EnglishWord[0]+'")');
        for(x in EnglishWord){
            if(x >= 1){
                EnglishWord[x-1] = EnglishWord[x];
            }
            console.log(EnglishWord[x]);
            if(EnglishWord[x+1] == null){
                EnglishWord[x] = null;
            }
        }
        //EnglishWord[EnglishWord.length]='\0';
     }
    console.log(EnglishWord);
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

