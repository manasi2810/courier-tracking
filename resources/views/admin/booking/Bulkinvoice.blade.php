 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <style type="text/css">
    body {
        font-family: 'Times New Roman', Times, serif;
    }  
  .mytable {
    border-collapse: collapse;
    width: 100%;
    background-color: white;
  }
  .mytable-body {
    border: 1px solid #36454F;
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: 0;
  }
  .mytable-body td {
    font-size: 12px;
    border: 1px solid #36454F;
    border-top: 0;
    border-right: 0; 
    border-bottom: 0;
    font-size:14px; 
    padding:2px;
  }
 @media print {
    .pagebreak { page-break-before: always; } /* page-break-after works, as well */
}
  
</style>
</head>
<body>
<div class="wrapper">
@php ($i = 0)
@foreach ($datas as $data)
  <!-- Main content -->
  <section class="invoice" >
    <!-- title row -->
     
      <table class="mytable mytable-body">
        <tr>
          <td width="40%" style> Source: {{ $data->pickuplocation }}<br></td>  
          <td width="60%" rowspan="3" class="center"><img src="{{ asset('image') }}/logo.png" alt="sb" style="width:45%; margin-left: 120px;">
        <p style="font-size: 9px; font-weight: bold; margin-left: 10px;"> HO :– A4, Mitul Industrial Estate, Sativali Road, Next to Nicholas Sai Service, Vasai – East -401208</p> </td>
          <tr>
        </tr> 
          <td>Destination: {{ $data->deliverylocation }}</td> 
        </tr> 
      </table>
      <table class="mytable mytable-body">
        <tr>
            <?php
            $booking_date = $data->booking_date;
            $formatted_date = date('d/m/Y', strtotime($booking_date));
            ?>
          <td width="30%"> Pickup Date: {{ $formatted_date }}</td> 
          <td width="40%" rowspan="9" align="center">
              <!--<div style="display: grid; place-items: center;">-->
              <img src="{{ route('BarcodeIMG',$data->forwordingno) }}" alt="Barcode">
              <p style="margin: 0 auto; ">{{ $data->forwordingno }}</p>
              
              </td>  
          <td width="30%">Dox/Non Dox: </td> 
        <tr>
        <tr>
            <?php
            $formatted_time = date('H:i', strtotime($booking_date));
            ?>
            <td>Time: {{ $formatted_time }} </td>  
           
            <td>No. Of. Pkg: {{ $data->pices }}</td>  
        <tr>
        <tr>
            <td>Sign:  </td> 
            
            <td>Act Wt (kg): {{ $data->weight }}</td>  
        <tr> 
        <tr>
            <td rowspan="2">Pack Type:  {{ $data->product_type }}</td>  
             
            <td>Dim Wt (kg): {{ $data->vol_weight }}</td>  
        </tr> 
        <tr> 
            <td width="20%">Chg Wt (kg): {{ $data->charg_weight }}</td>
             
        <tr> 
      </table>
      <table class="mytable mytable-body">
        <tr>
          <td width="30%"> Ref #:</td>  
    @if(!empty($data->dims))
    <td width="40%" rowspan="3">
        Dimension: {{ is_array($data->dimension) ? implode(',', $data->dimension) : $data->dimension }}
    </td>
@else
    <td width="40%" rowspan="3">
        Dimension: Not Available
    </td>
@endif
          <td width="30%">Declared Value:{{ $data->value }}</td> 
        <tr>
        <tr>
            <td>Spl inst:  </td>   
            <td>Collectable Amt:</td>  
        <tr> 
      </table>
      <table class="mytable mytable-body">
        <tr>
          <td width="15%" style="border-right: 0;">Customer: </td>  
          <td width="35%" style="border-left: 0;">  {{ $data->cust_name }} </td>  
          <td width="15%" style="border-right: 0;">To:</td> 
          <td width="35%" style="border-left: 0;"> {{ $data->con_client_name }} </td>  
        <tr>
        <tr>
            <td style="border-right: 0;">Sender: </td>
            <td style="border-left: 0;">{{ $data->client_name }}</td>   
            <td style="border-right: 0;">Attention: </td>  
            <td style="border-left: 0;">{{ $data->con_client_name }}</td>   
        <tr>
        <tr>
            <td style="border-right: 0;"> Address:  </td> 
            <td  style="border-left: 0;">{{ $data->pickupaddress }}</td>     
            <td style="border-right: 0;">Address: </td> 
            <td style="border-left: 0;">{{ $data->receiveraddress }}</td>    
        <tr> 
        <tr>
            <td style="border-right: 0;"> Pincode:  </td> 
            <td style="border-left: 0;">{{ $data->pickup_pincode }}</td>     
            <td style="border-right: 0;">Pincode: </td> 
            <td style="border-left: 0;">{{ $data->receiver_pincode }}</td>    
        </tr> 
        <tr>
            <td style="border-right: 0;">Contact No:</td>  
            <td style="border-left: 0;">{{$data->sendercontactno}}</td>   
            <td style="border-right: 0;">Contact No:</td>  
            <td style="border-left: 0;">{{$data->receivercontactno}}</td>   
        <tr>  
      </table>
      <table class="mytable mytable-body">
        <tr>
          <td width="100%">Commodity:</td>  
        <tr> 
      </table>
      <!--<table class="mytable mytable-body">-->
      <!--  <tr>-->
      <!--    <td width="100%">Delivery Details:</td>  -->
      <!--  <tr> -->
      <!--</table>-->
      <table class="mytable mytable-body" style="border-bottom: 1px solid #36454F; margin-bottom: 10px;">
           <tr>
          <td width="50%" colspan="2">Delivery Details:</td> 
        <tr> 
        <tr>
          <td width="50%" colspan="2">Delivery Date & Time: {{ $data->created_at }}</td> 
        <tr> 
        <!--<tr>-->
        <!--    <td width="50%" colspan="2">Time: {{ $data->created_at }}</td> -->
        <!--<tr> -->
        <tr>
            <td width="50%" colspan="2" style="border-right: 0;"> Name: {{ $data->con_client_name }}</td> 
            <td width="50%" style="border-left: 0;">Consignee Signature:</td> 
        <tr>   
      </table> 
      @if($i % 2 && ($i + 1) != count($datas))
        <div class="pagebreak"> </div>
    @endif
@php ($i++)   
@endforeach
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  setTimeout(function() {
    window.print();
  }, 1000);
</script>
</body>
</html>
         