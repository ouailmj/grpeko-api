var hidefirst = document.getElementsByClassName("hidenon");
for (let i = 0; i < hidefirst.length; i++) {
document.getElementsByClassName("hidenon")[i].style.display = "none";
}
/*function getdatestart(val)
{
    document.getElementById("daterendezvous").innerHTML=val.value;
}
function gethourstart(val)
{
    document.getElementById("heuredebutrendezvous").innerHTML=" du "+val.value + "h";
}
function gethourend(val)
{
    document.getElementById("heurefinrendezvous").innerHTML=" - "+val.value + "h";
}*/
$( document ).ready(function() {
    $('#societecreeer').on('change', function() {
                var hidenon = document.getElementsByClassName("hidenon");
                var hideoui = document.getElementsByClassName("hideoui");
                if( this.value==="Oui")
                {
                      for(let i = 0; i < hidenon.length; i++) { document.getElementsByClassName("hidenon")[i].style.display="none";}
                      for(let i = 0; i < hideoui.length; i++) { document.getElementsByClassName("hideoui")[i].style.display="block";}

                }
                else{
                    for(let i = 0; i < hideoui.length; i++) { document.getElementsByClassName("hideoui")[i].style.display="none";}
                    for(let i = 0; i < hidenon.length; i++) { document.getElementsByClassName("hidenon")[i].style.display="block";}
                }
            })

            $('#tutoie').on('change', function() {
                let tutoie = document.getElementsByClassName("tutoie");
                if( this.value==="Oui")
                {
                    for(var i = 0; i < tutoie.length; i++) { document.getElementsByClassName("tutoie")[i].innerHTML="ton";}
                }
                else {
                    for(var i = 0; i < tutoie.length; i++) { document.getElementsByClassName("tutoie")[i].innerHTML="votre";}
                }
            });
});