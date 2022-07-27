<template>
<div class="container">
    <section class="contact">
    <div class="box-top">
        <h1>Contattaci</h1>
        <p>Hai qualche domanda? Ci piacerebbe sentirti</p>
    </div>
    <div class="card-container">
        <div class="box box-down cyan">
        <h2>Supporto</h2>
        <p>Boolbnb fornisce il servizio clienti via e-mail</p>
        <button class="button-cyan"><a href="https://www.google.com/intl/it/gmail/about/"><i class="fa-solid fa-envelope-circle-check"></i></a></button>
        </div>

        <div class="box red mb-4">
        <h2>Chiamaci</h2>
        <p>Hai bisogno di metterti in contatto con noi?</p>
        <button class="button-red"><a href="#"><i class="fa-solid fa-phone"></i></a></button> 
        </div>

        <div class="box box-down blue mb-4">
        <h2>Github</h2>
        <p>Per maggiori informazioni sul nostro codice</p>
        <button class="button-blue"><a href="https://github.com/Mandrake091/boolbnb.git"><i class="fa-brands fa-github"></i></a></button>
        </div>
    </div>
    </section>
</div>
</template>

<script>
export default {
    name: 'ContactComponent',
}
</script>

<style lang="scss">

</style>