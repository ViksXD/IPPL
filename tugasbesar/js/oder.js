// Service prices
const prices = {
    reguler: 30000,
    premium: 50000,
    treatment: 60000,
  };
  
  // Quantities (default to 1 for each service)
  const quantities = {
    reguler: 1,
    premium: 1,
    treatment: 1,
  };
  
  // Function to update quantities
  function updateQuantity(service, delta) {
    // Update quantity
    quantities[service] = Math.max(0, quantities[service] + delta);
    
    // Update the UI
    document.getElementById(`quantity-${service}`).innerText = quantities[service];
    
    // Recalculate totals
    calculateTotals();
  }
  
  // Function to calculate totals
  function calculateTotals() {
    let totalItems = 0;
    let totalPrice = 0;
  
    for (const service in quantities) {
      totalItems += quantities[service];
      totalPrice += quantities[service] * prices[service];
    }
  
    document.getElementById('total-items').innerText = totalItems;
    document.getElementById('total-price').innerText = totalPrice.toLocaleString('id-ID');
  }
  
  // Function to handle payment
  function proceedToPayment() {
    const orderDetails = {
      items: quantities,
      total: document.getElementById('total-price').innerText,
    };
    console.log('Order Details:', orderDetails);
    alert('Proceeding to payment...');
  }
  
  // Initial calculation
  calculateTotals();
  