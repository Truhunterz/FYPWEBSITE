<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Booking</title>
  <style>
    /* Basic reset and styles */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      background-color: #f0f0f0;
      padding: 20px;
    }

    .table-container {
      overflow-x: auto;
      margin-top: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      overflow: hidden;
    }

    th, td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    caption {
      font-size: 1.5em;
      margin: 10px;
    }

    /* Responsive styles */
    @media screen and (max-width: 600px) {
      table {
        overflow-x: auto;
        display: block;
      }

      th, td {
        min-width: 150px;
        padding: 10px;
      }

      th {
        font-size: 14px;
      }

      td {
        font-size: 13px;
      }
    }

    /* Form container styles */
    .form-container {
      max-width: 600px;
      margin: 20px auto;
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-container label {
      display: block;
      margin-top: 10px;
    }

    .form-container input,
    .form-container select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
      box-sizing: border-box;
    }

    .form-container button {
      display: block;
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    .form-container button.close-btn {
      background-color: #f44336;
    }

    /* Calendar styles */
    .calendar {
      display: flex;
      flex-wrap: wrap;
      margin-top: 10px;
    }

    .day {
      flex: 0 0 45%;
      padding: 8px;
      border: 1px solid #ddd;
      cursor: pointer;
      margin: 5px;
      text-align: center;
    }

    .day.selected {
      background-color: #4CAF50;
      color: white;
    }

    .day.reserved {
      background-color: #f44336;
      color: white;
      cursor: not-allowed;
    }
  </style>
</head>
<body>

<div class="table-container">
  <table>
    <caption>Booking Prices</caption>
    <thead>
      <tr>
        <th>Court Type</th>
        <th>Price (Mon-Fri, 9am-6pm)</th>
        <th>Price (Mon-Fri, 6pm-1am)</th>
        <th>Price (Weekend & Holidays, 9pm-1am)</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Futsal Fifa (Interlock)</td>
        <td>RM100 per hour</td>
        <td>RM140 per hour</td>
        <td>RM140 per hour</td>
      </tr>
      <tr>
        <td>Futsal Interlock</td>
        <td>RM80 per hour</td>
        <td>RM120 per hour</td>
        <td>RM120 per hour</td>
      </tr>
      <tr>
        <td>Futsal Turf</td>
        <td>RM80 per hour</td>
        <td>RM120 per hour</td>
        <td>RM120 per hour</td>
      </tr>
      <tr>
        <td>Badminton</td>
        <td>RM20 (2 hours)</td>
        <td>RM36 per session (2 hour)</td>
        <td>RM36 per session (2 hour)</td>
      </tr>
    </tbody>
  </table>
</div>

<form id="bookingForm" class="form-container">
  <h2>Book a Court for Admin</h2>
  <label for="name">Name</label>
  <input type="text" id="name" required>
  <label for="email">Email</label>
  <input type="email" id="email" required>
  <label for="phone">Phone Number</label>
  <input type="tel" id="phone" required>
  <label for="court">Court Type</label>
  <select id="court" onchange="createCalendar()" required>
    <option value="">Select Court</option>
    <option value="Futsal Fifa (Interlock)">Futsal Fifa (Interlock)</option>
    <option value="Futsal Interlock">Futsal Interlock</option>
    <option value="Futsal Turf">Futsal Turf</option>
    <option value="Badminton">Badminton</option>
  </select>
  <label for="date">Choose Date</label>
  <input type="date" id="date" onchange="createCalendar()" required>
  <label for="venueSlots">Choose Venue Slot (Choose 1 venue only)</label>
  <div class="calendar" id="venueCalendar"></div> 
  <label for="timeSlots">Choose Time Slots (up to 3)</label>
  <div class="calendar" id="calendar"></div>
  <label for="price">Price</label>
  <input type="text" id="price" name="price" readonly>
  <br>
  
  <div class="bank-transfer-info">
    <h3>Bank Transfer Information</h3>
    <p>Please transfer the total amount to the following account:</p>
    <p>Account Name: JesselballSportsCentre</p>
    <p>Account Number: 22601001437</p>
    <p>Bank Name: HONGLEONG BANK</p>
  </div>
  
  <label for="receiptFile">Select receipt file to upload:</label>
  <input type="file" name="receiptFile" id="receiptFile" required>
  
  <br>
  <button type="button" onclick="submitBooking()">Submit</button>
  <button type="button" class="close-btn" onclick="closeForm()">Back</button>
</form>



<script>

function toggleMenu() {
      var menu = document.getElementById('navbar-menu');
      menu.classList.toggle('active');
}


function createCalendar() {
    const courtType = document.getElementById('court').value;
    const date = document.getElementById('date').value;
    const calendar = document.getElementById('calendar');
    const venueCalendar = document.getElementById('venueCalendar');
    calendar.innerHTML = '';
    venueCalendar.innerHTML = '';

    if (courtType && date) {
        fetch('check_availability.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ court: courtType, date: date })
        })
       .then(response => response.json())
       .then(data => {
            // const existingTimeSlots = Array.from(calendar.children).map(slot => slot.textContent.trim());
            const existingVenueSlots = Array.from(venueCalendar.children).map(slot => slot.textContent.trim());

            // renderTimeSlots(courtType, data.timeSlots, existingTimeSlots);
            renderVenueSlots(courtType, data.venueSlots, existingVenueSlots);
        })
       .catch(error => console.error('Error:', error));
    }
}

function createTimeSlot(venueValue) {
    const courtType = document.getElementById('court').value;
    const date = document.getElementById('date').value;
    const calendar = document.getElementById('calendar');
    calendar.innerHTML = '';
    
    if (courtType && date && venueValue) {
        fetch('check_availability.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ court: courtType, date: date, venueValue: venueValue })
        })
       .then(response => response.json())
       .then(data => {
            const existingTimeSlots = Array.from(calendar.children).map(slot => slot.textContent.trim());
            // const existingVenueSlots = Array.from(venueCalendar.children).map(slot => slot.textContent.trim());

            renderTimeSlots(courtType, data.timeSlots, existingTimeSlots);
            // renderVenueSlots(courtType, data.venueSlots, existingVenueSlots);
        })
       .catch(error => console.error('Error:', error));
    }
}

function renderTimeSlots(courtType, timeSlots, existingTimeSlots) {
    let slots = [];

    console.log(timeSlots);

    if (courtType === 'Badminton') {
        slots = [
            '9:00 AM - 11:00 AM', '11:00 AM - 1:00 PM',
            '1:00 PM - 3:00 PM', '3:00 PM - 5:00 PM',
            '5:00 PM - 7:00 PM', '7:00 PM - 9:00 PM',
            '9:00 PM - 11:00 PM', '11:00 PM - 1:00 AM'
        ];
    } else {
        slots = [
            '9:00 AM - 10:00 AM', '10:00 AM - 11:00 AM',
            '11:00 AM - 12:00 PM', '12:00 PM - 1:00 PM',
            '1:00 PM - 2:00 PM', '2:00 PM - 3:00 PM',
            '3:00 PM - 4:00 PM', '4:00 PM - 5:00 PM',
            '5:00 PM - 6:00 PM', '6:00 PM - 7:00 PM',
            '7:00 PM - 8:00 PM', '8:00 PM - 9:00 PM',
            '9:00 PM - 10:00 PM', '10:00 PM - 11:00 PM',
            '11:00 PM - 12:00 AM', '12:00 AM - 1:00 AM'
        ];
    }

    slots.forEach(slot => {
        if (!existingTimeSlots.includes(slot)) {
            const dayDiv = document.createElement('div');
            dayDiv.className = 'day';
            dayDiv.textContent = slot;

            if (timeSlots.includes(slot)) {
                dayDiv.classList.add('reserved');
            } else {
                dayDiv.onclick = () => toggleSlotSelection(dayDiv);
            }

            calendar.appendChild(dayDiv);
        }
    });
}

function renderVenueSlots(courtType, venueSlots, existingVenueSlots) {
    let slots = [];

    if (courtType === 'Badminton') {
        slots = ['Venue 1', 'Venue 2', 'Venue 3', 'Venue 4', 'Venue 5', 'Venue 6'];
    } else if (courtType === 'Futsal Fifa (Interlock)') {
        slots = ['Venue 1'];
    } else if (courtType === 'Futsal Interlock') {
        slots = ['Venue 1', 'Venue 2'];
    } else if (courtType === 'Futsal Turf') {
        slots = ['Venue 1', 'Venue 2', 'Venue 3'];
    } else {
        console.error('Unknown court type:', courtType);
        return;
    }

    slots.forEach(slot => {
        if (!existingVenueSlots.includes(slot)) {
            const dayDiv = document.createElement('div');
            dayDiv.className = 'day';
            dayDiv.textContent = slot;

            
            dayDiv.classList.add('venue');
            dayDiv.onclick = () => toggleSlotSelection(dayDiv);
            

            venueCalendar.appendChild(dayDiv);
        }
    });
}
        function toggleSlotSelection(element) {
            const selectedSlots = document.querySelectorAll('.day.selected:not(.venue)');
            const selectedVenueSlots = document.querySelectorAll('.day.selected.venue');

            if (element.classList.contains('selected')) {
                element.classList.remove('selected');
            } else if (!element.classList.contains('venue') && selectedSlots.length < 3) {
                element.classList.add('selected');
            } else if (element.classList.contains('venue') && selectedVenueSlots.length === 0) {
                element.classList.add('selected');
                // get time slot
                createTimeSlot(element.textContent);
            } else {
                if (!element.classList.contains('venue')) {
                    alert('You can only select up to 3 time slots.');
                } else {
                    alert('You can only select 1 venue slot.');
                }
            }

            updateTotalPrice();
        }

    function convertTo24Hour(time) {
    const [hour, minutePart] = time.split(':');
    const [minute, period] = minutePart.split(' ');
    let hour24 = parseInt(hour);

    if (period === 'PM' && hour24 !== 12) {
        hour24 += 12;
    } else if (period === 'AM' && hour24 === 12) {
        hour24 = 0;
    }

    return hour24;
}

    function updateTotalPrice() {
    const court = document.getElementById('court').value;
    const date = document.getElementById('date').value;
    const selectedTimeSlots = document.querySelectorAll('.day.selected:not(.venue)');

    // Calculate totalPrice based on selected time slots
    let totalPrice = 0;

    selectedTimeSlots.forEach(slot => {
    const timeRange = slot.textContent.trim();
    const times = timeRange.split(' - ');
    let startHour = convertTo24Hour(times[0]);
    let endHour = convertTo24Hour(times[1]);

    // Adjust endHour if it's past midnight
    if (endHour < startHour) {
        endHour += 24;
    }

    const dayOfWeek = new Date(date).getDay(); // 0 (Sunday) to 6 (Saturday)
    let currentHour = startHour;

    if (court === 'Badminton') {
        while (currentHour < endHour) {
            let nextHour = Math.min(currentHour + 2, endHour); // Move in 2-hour blocks
            let hourlyRate = 0;

            if (dayOfWeek >= 1 && dayOfWeek <= 5) { // Monday to Friday
                if (currentHour >= 9 && currentHour < 18) {
                    hourlyRate = 20; // RM20 for 2 hours (per session)
                    currentHour += 2; // Move by 2 hours
                } else {
                    hourlyRate = 36; // RM36 per 2 hours (per session)
                    currentHour += 2; // Move by 2 hours
                }
            } else { // Saturday, Sunday, and Holidays
                hourlyRate = 36; // RM36 per 2 hours (per session)
                currentHour += 2; // Move by 2 hours
            }

            totalPrice += hourlyRate;
        }
    } else {
        while (currentHour < endHour) {
            let nextHour = Math.min(currentHour + 1, endHour);
            let hourlyRate = 0;

            if (court === 'Futsal Fifa (Interlock)') {
                if (dayOfWeek >= 1 && dayOfWeek <= 5) { // Monday to Friday
                    if (currentHour >= 9 && currentHour < 18) {
                        hourlyRate = 100;
                    } else {
                        hourlyRate = 140;
                    }
                } else { // Saturday, Sunday, and Holidays
                    hourlyRate = 140;
                }
            } else if (court === 'Futsal Interlock' || court === 'Futsal Turf') {
                if (dayOfWeek >= 1 && dayOfWeek <= 5) { // Monday to Friday
                    if (currentHour >= 9 && currentHour < 18) {
                        hourlyRate = 80;
                    } else {
                        hourlyRate = 120;
                    }
                } else { // Saturday, Sunday, and Holidays
                    hourlyRate = 120;
                }
            }

            totalPrice += hourlyRate;
            currentHour = nextHour;
        }
    }
    });

    document.getElementById('price').value = 'RM ' + totalPrice.toFixed(2);
}



function submitBooking() {
    const form = document.getElementById('bookingForm');
    const name = form.querySelector('#name').value;
    const email = form.querySelector('#email').value;
    const phone = form.querySelector('#phone').value;
    const court = form.querySelector('#court').value;
    const date = form.querySelector('#date').value;
    const selectedTimeSlots = document.querySelectorAll('.day.selected:not(.venue)');
    const selectedVenueSlots = document.querySelectorAll('.day.selected.venue');
    const receiptFile = document.getElementById('receiptFile').files[0]; // Get the selected file

    if (!name || !email || !phone || !court || !date || selectedTimeSlots.length === 0 || selectedVenueSlots.length === 0 || !receiptFile) {
        alert('Please fill out all fields, select at least one time slot, one venue slot, and upload a receipt file.');
        return;
    }

    // Extract numerical part of price
    const totalPrice = parseFloat(document.getElementById('price').value.replace('RM ', ''));

    const formData = new FormData();
    formData.append('name', name);
    formData.append('email', email);
    formData.append('phone', phone);
    formData.append('court', court);
    formData.append('date', date);
    formData.append('price', totalPrice); // Use numerical value of price
    formData.append('receiptFile', receiptFile); // Append the file

    // Collect selected time slots
    const timeSlots = Array.from(selectedTimeSlots).map(slot => slot.textContent.trim()).join(', ');
    formData.append('timeSlots', timeSlots);

    // Collect selected venue slots
    const venueSlots = Array.from(selectedVenueSlots).map(slot => slot.textContent.trim()).join(', ');
    formData.append('venueSlots', venueSlots);

    // Fetch POST request to insert.php
    fetch('insert.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            // After successful data insertion, generate the invoice
            generateInvoice(name, email, phone, court, date, timeSlots, venueSlots, totalPrice);
        } else {
            alert('Error submitting booking: ' + data.error);
        }
    })
    .catch(error => {
        alert('Error submitting booking: ' + error.message);
    });

}

function generateInvoice(name, email, phone, court, date, timeSlots, venueSlots, price) {
    const formData = new FormData();
    formData.append('name', name);
    formData.append('email', email);
    formData.append('phone', phone);
    formData.append('court', court);
    formData.append('date', date);
    formData.append('timeSlots', timeSlots);
    formData.append('venueSlots', venueSlots);
    formData.append('price', price);

    fetch('generate_invoice.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.blob())
    .then(blob => {
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'invoice.pdf';
        document.body.appendChild(a);
        a.click();
        a.remove();
        alert('Booking submitted successfully!');
        document.getElementById('bookingForm').reset(); // Reset form on success
        createCalendar(); // Reset calendar after form reset
    })
    .catch(error => {
        alert('Error generating invoice: ' + error.message);
    });
}

function closeForm() {
    const form = document.getElementById('bookingForm');
    form.reset();
    createCalendar(); // Reset calendar after form reset
    window.location.href = 'bookdetails.php'; 
}

document.getElementById('date').addEventListener('change', function() {
    createCalendar();
});
    // Initialize calendar on page load
    createCalendar(); 
</script>

</body>
</html>
