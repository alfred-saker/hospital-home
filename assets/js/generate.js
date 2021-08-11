function generate(l) {
    if (typeof l==='undefined'){var l=8;}
    /* c : chaîne de caractères alphanumérique */
    var c='abcdefghijknopqrstuvwxyzACDEFGHJKLMNPQRSTUVWXYZ12345679',
    n=c.length,
    /* p : chaîne de caractères spéciaux */
    p='!@#$+-*&_',
    o=p.length,
    r='',
    n=c.length,
    /* s : determine la position du caractère spécial dans le mdp */
    s=Math.floor(Math.random() * (p.length-1));

    for(var i=0; i<l; ++i){
        if(s == i){
            /* on insère à la position donnée un caractère spécial aléatoire */
            r += p.charAt(Math.floor(Math.random() * o));
        }else{
            /* on insère un caractère alphanumérique aléatoire */
            r += c.charAt(Math.floor(Math.random() * n));
        }
    }
    return r;
}

/* exemple de fonction génération de mdp dans un form (utilise JQuery) */
$(document).ready(function() {
    /* on détecte un des champ du formulaire contient une class "gen", on insérera un bouton dans sa div parent qui appelera la fonction generate() */
    if($('form input.gen').length){
        $('form input.gen').each(function(){
            $('<span class="generate"><i class="fa fa-fw fa-refresh"></i></span>').appendTo($(this).parent());
        });
    }
   
    /* évènement click sur un element de class "generate" > appelle la fonction generate() */
    $(document).on('click','.generate', function(e){
        e.preventDefault();
        /* ajout du mot de passe + changement du paramètre type de password vers text (pour lisibilité) */
        $(this).parent().children('input').val(generate()).attr('type','text');
    });
});