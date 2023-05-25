


paypal.Buttons({
    createOrder : function(data, actions){
        return actions.order.create({
            purchase_units : [{
                amount:{
                    value : '0.1'//renseigner le montant que la personne doit verser sur votre compte
                }
            }]
        });
    },
    onApprove: function(data, actions) {

        alert('You have successfully created subscription ' + data.subscriptionID); //message d'alerte quand le paiment est effectué
    
      }
}).render('body'); 