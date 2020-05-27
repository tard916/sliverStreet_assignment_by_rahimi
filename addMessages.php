<h2>Add sms by clicking the button</h2>
<input type="button" value= "Add SMS" style="width: 100%; height: 12vh; margin-bottom: 5rem;" onclick="addSms()">
<br>
<h2>Add email by clicking the button</h2>
<input type="button" value= "Add Email" style="width: 100%; height: 12vh;" onclick="addEmail()">
<script>
 function addSms(){
  fetch('http://localhost:8080/sliverStreet_assignment_by_rahimi/api/sms/inputSms.php', {
      method: 'POST',
      headers : new Headers(),
      body:JSON.stringify({
        "sender": "0178819454",
        "sms_content": "this is the first test for smsSummary."
      })
  }).then((res) => res.json())
  .then((data) =>  console.log(data))
  .catch((err)=>console.log(err))
}

function addEmail(){
  fetch('http://localhost:8080/sliverStreet_assignment_by_rahimi/api/email/inputEmail.php', {
      method: 'POST',
      headers : new Headers(),
      body:JSON.stringify({
        "sender": "rahimi.diallo@224tech.com",
        "email_content": "this is the first test for smsSummary."
      })
  }).then((res) => res.json())
  .then((data) =>  console.log(data))
  .catch((err)=>console.log(err))
}
</script>