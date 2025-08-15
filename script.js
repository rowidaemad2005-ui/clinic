document.getElementById("bookingForm").addEventListener("submit", function(event) {
    event.preventDefault();
    alert("تم إرسال طلب الحجز بنجاح! سنتواصل معك قريباً.");
    this.reset();
});
