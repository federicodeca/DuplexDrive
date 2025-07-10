// This script manages the date range selection and pricing logic for a rental car 


$(document).ready(function() { // Assicurati che il DOM sia pronto prima di eseguire il codice


  $('#date-range').daterangepicker({   // Inizializza il date range picker
    locale: { format: 'YYYY-MM-DD' },
    minDate: moment().startOf('day'),
    
    
    
    isInvalidDate: function(date) {
      // Disabilita singoli giorni che sono dentro gli intervalli bloccati
      for (const period of indisp) {
        const startBlocked = moment(period.start, 'YYYY-MM-DD');
        const endBlocked = moment(period.end, 'YYYY-MM-DD');
        if (date.isBetween(startBlocked, endBlocked, null, '[]')) { //[] estremi inclusi
          return true;
        }
      }
      return false;
    },

    

    startDate: moment().startOf('month'),
    endDate: moment().endOf('month'),

    isCustomDate: function(date) {
      
      for (const period of surcharges) {
        const startSurcharge = moment(period.start, 'YYYY-MM-DD');
        const endSurcharge = moment(period.end, 'YYYY-MM-DD');

        if(date.isBetween(startSurcharge, endSurcharge, null, '[]'))  {
         
          if (period.price >basePrice){

            return 'high-price'; // Data personalizzata con sovrapprezzo
          }
          else if(period.price <basePrice) {
          
            return 'low-price'; 
          }

          else {return 'normal-price';

          }

        }

      } 
    return '';
    },

      
  }, function(start, end) { //le callback vengono lanciate
    totalPrice(start,end);  // Callback dopo selezione range controllo se date start e end si sovrappongono con le date non disponibili
    let isInvalidRange = false;
    let i= 0;
    while (!isInvalidRange && i<indisp.length) {
      const period = indisp[i];
      const startBlocked = moment(period.start, 'YYYY-MM-DD');
      const endBlocked = moment(period.end, 'YYYY-MM-DD');
      if (start.isBefore(endBlocked) && end.isAfter(startBlocked)) {
        isInvalidRange = true;
      }
        i++;
    }

    if (isInvalidRange) {
      alert("Il periodo selezionato include date non disponibili. Scegli un intervallo diverso.");
      // Resetta i valori e svuota input
      $('#date-range').val('');
      $('#startDate').val('');
      $('#endDate').val('');
    } else {
      // Se valido, aggiorna i campi hidden
      $('#startDate').val(start.format('YYYY-MM-DD'));
      $('#endDate').val(end.format('YYYY-MM-DD'));
    }
  });

  // inizializza i campi hidden con inizio e fine di questo mese
  var picker = $('#date-range').data('daterangepicker');
  if (picker) {
    $('#startDate').val(picker.startDate.format('YYYY-MM-DD'));
    $('#endDate').val(picker.endDate.format('YYYY-MM-DD'));
  }

  function totalPrice(start, end) {
    let dates = [];
    let currentDate = start.clone(); // Clona la data di inizio per non modificarla direttamente

    while (currentDate.isSameOrBefore(end)) { //crea un array di date tra start e end
      dates.push(currentDate.clone());  
      currentDate.add(1, 'days');       
    }

    let totalPrice = 0;

    for (const date of dates) {
      let prezzoData = basePrice;
      for (const period of surcharges) {
        const startSurcharge = moment(period.start, 'YYYY-MM-DD');
        const endSurcharge = moment(period.end, 'YYYY-MM-DD');
        if (date.isBetween(startSurcharge, endSurcharge, null, '[]')) {
          prezzoData = period.price;
          break;
        }
      }
      totalPrice += prezzoData;
    }

    $('#totalPriceDisplay').text(totalPrice);
    
    }

});
