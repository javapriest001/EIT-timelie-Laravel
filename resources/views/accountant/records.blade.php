@include('accountant.Includes.header')

<div class="container-fluid">
    <div class="row">
        @include('accountant.Includes.navbar')
        <div class="col-md-8">
            <!--============ MAIN SECTION================= -->
            <div class="container-fluid main">
                <h3 class="welcome">ACCOUNTANT'S RECORD</h3>
                <div class="row gap-6 mt-5">
                    <div class="col-md-8">
                        <input class="form-control" type="date" name="" id="" />
                    </div>
                    <!-- <div class="col-md-2 justify-content-end">
                        <a class="btn btn-primary addbutton" href="">
                            <h4 class="feeamt">
                                <span class="material-icons-sharp addfeeicon"> add </span>
                                Add
                            </h4>
                        </a>
                    </div> -->
                </div>
                <!-- <h4 class="">Accountant's Records</h4> -->
                <div class="row staff table">
                    <div class="">
                        <div class="card staff_list_card_role">
                            <div class="card-body">

                                <table class="table table-responsive">
                                    <thead>
                                        <tr>

                                            <th scope="col"></th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($records as $record)
                                        <tr>

                                            <td><span class="material-icons-sharp table_icon_1">
                                                    receipt_long
                                                </span></td>
                                            <td>{{$record->first_name}}</td>
                                            <td>{{$record->surname}}</td>
                                            <td>{{$record->date}}</td>
                                            <td><a href="javascript:void(0)" class="viewall" data-code="{{$record->id}}"><span class="material-icons-sharp text-muted  table_icon">
                                                        visibility
                                                    </span></a></td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 d-none d-md-block">
            <div class="row lastmain d-none d-md-block">
                <div class="col-9 profile_name align-items-center">
                    <h4>Role</h4>
                    <h4 class="text-muted">Administrator</h4>
                </div>
                <div class="col-2 profile_img">
                    <img src="Assets/CSS/IMG/Profile_avatar_placeholder_large.png" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal  fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content jquerymodal">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">




            </div>

        </div>
    </div>
</div>

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

                url: '<?php echo route("singlerecord"); ?>',
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
      <td>${parseFloat(resposnse.correction) } </td>
      <td>  <?php echo ' ₦'.$data['Amount'];?>  </td>
      <td>${parseFloat(resposnse.correction) * <?php echo $data['Amount']; ?>} </td>
      
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
      <td>${parseFloat(resposnse.onlinereg) }  </td>
      <td> <?php echo ' ₦'.$Onlinereg['Amount'];?>   </td>
      <td>${parseFloat(resposnse.onlinereg) * <?php echo $Onlinereg['Amount']; ?>} </td>
      
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
      <td colspan="3">${(parseFloat(resposnse.correction) * <?php echo $data['Amount']; ?>) + (parseFloat(resposnse.part_time) * <?php echo $parttime['Amount']; ?>) + (parseFloat(resposnse.onlinereg) * <?php echo $Onlinereg['Amount']; ?> ) + (parseFloat(resposnse.profile_crtn) * <?php echo $profilecrtn['Amount']; ?>) + (parseFloat(resposnse.printing) * <?php echo $printing['Amount']; ?>) + (parseFloat(resposnse.validation) * <?php echo $validation['Amount']; ?>) + (parseFloat(resposnse.uploads) * <?php echo $uploads['Amount']; ?>) + (parseFloat(resposnse.post_utme) * <?php echo $putme['Amount']; ?>)    }   </td>
      
    </tr>
    
   
  </tbody>
  
</table>

    <hr style="border: #314A7C 6px solid ; color:#314A7C;">
    <h1 style="font-size: 20px" class="text-center">SECTION B</h1>

    <table class="table">
      <thead>
          <tr>
          
          <th scope="col-3">Activity</th>
          <th scope="col">&nbsp; </th>
          <th scope="col">&nbsp;</th>
          <th scope="col">Total</th>
          </tr>
      </thead>
      <tbody>
          <tr> 
          
              <td col="3"><h5><strong>  Opening Balance: </strong></h5></td>
              <td><?php echo '&nbsp;' ?> </td>
              <td> <?php echo '&nbsp;' ?>   </td>
              <td> ${parseFloat(resposnse.profile_crtn) }  </td>
              
        </tr>
          <tr>
          
              <td col="3"><h5><strong>  Closing Balance: </strong></h5></td>
              <td><?php  ?> </td>
              <td> <?php ?>   </td>
              <td> ${(parseFloat(resposnse.jamb_payall) * <?php echo $jambpay['Amount']; ?>) + (parseFloat(resposnse.jamb_remita) * <?php echo $jambremita['Amount']; ?>) + (parseFloat(resposnse.putme_amt) * <?php echo $putme['Amount']; ?> ) - parseFloat(resposnse.exp_amt)  }  </td>
              
        </tr>
      </tbody>
    </table>
    <table class="table">
      <thead>
          <tr>
          
          <th scope="col-3">Activity</th>
          <th scope="col"> Number </th>
          <th scope="col">Pay Att.(Amt) </th>
          <th scope="col">Remita(Amt) </th>
          
          </tr>
      </thead>
      <tbody>
      <h1 style="font-size: 20px" class="text-center">Payments Made</h1>

          <tr> 
          
              <td col="3"><h5><strong> JAMB </strong></h5></td>
              <td>${resposnse.jamb_no}</td>
              <td> ${resposnse.jamb_payall}<?php echo '('.$jambpay['Amount'].')'?>    </td>
              <td>${resposnse.jamb_remita}<?php echo '('.$jambremita['Amount'].')'?>  </td>
             
              
        </tr>
       
          
          <tr> 
          
              <td ><h5><strong> Total Payments </strong></h5></td>
              <td> </td>
              <td>    </td>
              
              <td> ${(parseFloat(resposnse.jamb_payall) * <?php echo $jambpay['Amount']; ?>) + (parseFloat(resposnse.jamb_remita) * <?php echo $jambremita['Amount']; ?>) + (parseFloat(resposnse.putme_amt) * <?php echo $putme['Amount']; ?> ) - parseFloat(resposnse.exp_amt)  }  <?php //echo ' ₦'.($Jamb_pay * $record['jamb_payall']) + ($record['jamb_remita']  * $Jamb_remita) +  ($record['putme_amt']  * $Putme) ?>  </td>
              
        </tr>
      
      </tbody>
    </table>

    <table class="table">
          <thead>
                <tr>
                
                <th scope="col" >Expenses</th>
                <th scope="col">  </th>
                <th scope="col">Amount</th>
                <th scope="col">Remark</th>
                
                </tr>
            </thead>
            <tbody>
                <tr> 
              
                  <td ><h5><strong> Expenses </strong></h5></td>
                  <td> </td>
                  <td> ${resposnse.exp_amt}    </td>
                  <td> ${resposnse.exp_remark} </td>
            
              
                </tr>
                <tr> 
              
                  <td colspan="1"><h5><strong> Total </strong></h5></td>
                  <td> </td>
                  <td>    </td>
                  <td> ${resposnse.exp_amt}   </td>
            
              
                </tr>


                <hr style="border: #314A7C 6px solid ; color:#314A7C;">

                <tr> 
              
                  <td colspan="1"><h5><strong> Total Profits </strong></h5></td>
                  <td> </td>
                  <td>    </td>
                  <td> ${(parseFloat(resposnse.jamb_payall) * <?php echo $jambpay['Amount']; ?>) + (parseFloat(resposnse.jamb_remita) * <?php echo $jambremita['Amount']; ?>) + (parseFloat(resposnse.putme_amt) * <?php echo $putme['Amount']; ?> ) - parseFloat(resposnse.exp_amt)  } <?php //echo ' ₦'.(($Jamb_pay * $record['jamb_payall']) + $opening + ($record['jamb_remita']  * $Jamb_remita) +  ($record['putme_amt']  * $Putme)) - ($record['exp_amt']) ?>  </td>
            
          
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
@include('accountant.Includes.footer')