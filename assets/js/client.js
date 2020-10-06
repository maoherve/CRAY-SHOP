$(document).ready(function(){

    // Create a Stripe client
    const stripe = Stripe('pk_test_A45s2laXHrCRj6Tow44dk67z');

    // Create an instance of Elements
    const elements = stripe.elements();

    // Try to match bootstrap 4 styling
    const style = {
        base: {
            'lineHeight': '1.35',
            'fontSize': '1.11rem',
            'color': '#495057',
            'fontFamily': 'apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif'
        }
    };

    // Card number
    const card = elements.create('cardNumber', {
        'placeholder': '',
        'style': style
    });
    card.mount('#card-number');

    // CVC
    const cvc = elements.create('cardCvc', {
        'placeholder': '',
        'style': style
    });
    cvc.mount('#card-cvc');

    // Card number
    const exp = elements.create('cardExpiry', {
        'placeholder': '',
        'style': style
    });
    exp.mount('#card-exp');

    // Submit
    $('#payment-submit').on('click', function(e){
        e.preventDefault();
        const cardData = {
            'name': $('#name').val()
        };
        stripe.createToken(card, cardData).then(function(result) {
            console.log(result);
            if(result.error && result.error.message){
                alert(result.error.message);
            }else{
                alert(result.token.id);
            }
        });
    });

});