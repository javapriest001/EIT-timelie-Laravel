<script src="js.app"></script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        //alert('done')
        $('.viewall').click(function(e) {
            e.preventDefault();
            let data = $(this).attr('data-code')

            console.log(data)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({

                url: '<?php echo route("desksinglerecord"); ?>',
                method: 'post',
                data: {
                    id: $(this).attr('data-code')
                },
                dataType: 'json',


                success: function(data) {

                    $('#staticBackdrop').modal('show')
                    let result = JSON.stringify(data.result)
                    let resposnse = JSON.parse(result)


                    let table = `
                    
                    <div id="print">

  
    <h1 style="font-size: 20px" class="text-center">INDIVIDUAL RECORD</h1>
    <hr style="border: #314A7C 6px solid ; color:#314A7C;">
    <h5 style="margin-top:-10px;" class=""><strong> Name: </strong> &nbsp; <?php  echo $avatar['first_name'] ?>  <?php echo $avatar['surname'] ?></h5>
    <h5 style="margin-top:-8px;"><strong> Role: </strong> &nbsp; <?php echo $avatar['category'] ?> </h5>
    <h5 style="margin-top:-8px;"><strong> Date: </strong> &nbsp; <?php echo $avatar['date'] ?> </h5>

    <hr style="border: #314A7C 6px solid ; color:#314A7C;">

    <h1 style="font-size: 20px" class="text-center">SECTION A</h1>
    <table class="table">
        <thead>
        <tr>
        
        <th scope="col">Activity</th>
        <th scope="col">Number</th>
        <th scope="col">Unit Price</th>
        <th scope="col">Total</th>
        </tr>
    </thead>
  <tbody>
    <tr>
     
      <td><h5><strong>  Uploads: </strong></h5></td>
      <td>${parseFloat(resposnse.uploads) } </td>
      <td>  <?php echo ' ₦'.$uploads['Amount'];?>  </td>
      <td>${parseFloat(resposnse.uploads) * <?php echo $uploads['Amount']; ?>}</td>
      
    </tr>
    <tr>
     
      <td><h5><strong> Data  Corrections: </strong></h5></td>
      <td>${parseFloat(resposnse.corrections) } </td>
      <td>  <?php echo ' ₦'.$data['Amount'];?>  </td>
      <td>${parseFloat(resposnse.corrections) * <?php echo $data['Amount']; ?>} </td>
      
    </tr>
    <tr>
     
      <td><h5><strong>  Printing: </strong></h5></td>
      <td>${parseFloat(resposnse.printing) }</td>
      <td> <?php echo ' ₦'.$printing['Amount'];?>  </td>
      <td>${parseFloat(resposnse.printing) * <?php echo $printing['Amount']; ?>} </td>
      
    </tr>
    <tr>
     
      <td><h5><strong>  Validation: </strong></h5></td>
      <td>${parseFloat(resposnse.validation) } </td>
      <td> <?php echo ' ₦'.$validation['Amount'];?>    </td>
      <td>${parseFloat(resposnse.validation) * <?php echo $validation['Amount']; ?>}</td>
      
    </tr>
    <tr>
     
      <td><h5><strong>Profile Creation: </strong></h5></td>
      <td>${parseFloat(resposnse.profile_crtn) }  </td>
      <td> <?php echo ' ₦'.$profilecrtn['Amount'];?>   </td>
      <td>${parseFloat(resposnse.profile_crtn) * <?php echo $profilecrtn['Amount']; ?>}  </td>
      
    </tr>
    <tr>
     
      <td><h5><strong>  Online Registration: </strong></h5></td>
      <td>${parseFloat(resposnse.online_reg) }  </td>
      <td> <?php echo ' ₦'.$Onlinereg['Amount'];?>   </td>
      <td>${parseFloat(resposnse.online_reg) * <?php echo $Onlinereg['Amount']; ?>} </td>
      
    </tr>
    <tr>
     
      <td><h5><strong>  Part-Time Services: </strong></h5></td>
      <td>${parseFloat(resposnse.part_time) }  </td>
      <td> <?php echo ' ₦'.$parttime['Amount'];?>  </td>
      <td>${parseFloat(resposnse.part_time) * <?php echo $parttime['Amount']; ?>} </td>
      
    </tr>
    <tr>
     
      <td><h5><strong>Profile Creation: </strong></h5></td>
      <td>${parseFloat(resposnse.profile_crtn) }   </td>
      <td> <?php echo ' ₦'.$profilecrtn['Amount'];?>   </td>
      <td>${parseFloat(resposnse.profile_crtn) * <?php echo $profilecrtn['Amount']; ?>}  </td>
      
    </tr>
    <tr>
     
      <td><h5><strong>Post UTME: </strong></h5></td>
      <td>${parseFloat(resposnse.post_utme) }   </td>
      <td> <?php echo ' ₦'.$putme['Amount'];?>   </td>
      <td>${parseFloat(resposnse.post_utme) * <?php echo $putme['Amount']; ?>}  </td>
      
    </tr>
    <tr>
     
      <td><h5><strong>  Total: </strong></h5></td>
      <td> </td>
      <td> </td>
      <td colspan="3">${(parseFloat(resposnse.corrections) * <?php echo $data['Amount']; ?>) + (parseFloat(resposnse.part_time) * <?php echo $parttime['Amount']; ?>) + (parseFloat(resposnse.online_reg) * <?php echo $Onlinereg['Amount']; ?> ) + (parseFloat(resposnse.profile_crtn) * <?php echo $profilecrtn['Amount']; ?>) + (parseFloat(resposnse.printing) * <?php echo $printing['Amount']; ?>) + (parseFloat(resposnse.validation) * <?php echo $validation['Amount']; ?>) + (parseFloat(resposnse.uploads) * <?php echo $uploads['Amount']; ?>) + (parseFloat(resposnse.post_utme) * <?php echo $putme['Amount']; ?>)    }   </td>
      
    </tr>
    
   
  </tbody>
  
</table>

    

    

   
</div>











                    
                    

                    `

                    $('.modal-body').html(table)
                    console.log(resposnse);

                }
            })
        })
    })
</script>
</body>

</html>