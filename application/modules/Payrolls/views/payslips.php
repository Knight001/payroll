
<style>
  @media print {
  .hidden-print {
    display: none !important;
  }
}
<?php
 $month = $this->input->get('month');
  $year = $this->input->get('year');
 ?>
</style>
<div class="hidden-print">
<a class="btn btn-info btn-sm" onclick="window.print()"><i class="fas fa-print"></i>Print </a>
</div>
<?php foreach($employees as $employee): ?>
  <div class="container">
  	<div class="row">
  			<div class="table-responsive">
                  <div class="table-responsive custom_datatable">
  					<table class="table table-borderless" style="width:100%;margin:auto;text-align:left;" >
                          <tbody>
  							<tr>
                                  <td rowspan="2" colspan="2"><h3 style="margin:8px 0 0 63px;">TENNYSON HLABANGANA HIGH SCHOOL</h3></td>
                                  <td>PAY ADVICE</td>
  								<td colspan="2"><img src="<?php echo base_url(); ?>assets/img/logo.jpeg" alt="" width="75" height="50"></td>
                              </tr>
                              </tbody>
                              </table>
                              <table class="table table-borderless" style="width:100%;margin:auto;text-align:left;" >
                          <tbody>
  							<tr>
                                  <td rowspan="2" colspan="2"><?php echo sprintf('%04d', $employee->employee_id); ?></td>
                                  <td><?php echo strtoupper($employee->firstname.' '.$employee->lastname); ?></td>
  								<td colspan="2"></td>
                              </tr>
                              </tbody>
                              </table>
                              <table class="table table-borderless" style="width:100%;margin:auto;text-align:left;" >
                          <tbody>
  							<tr>
                                  <td rowspan="2" colspan="2"><strong>Cost Centre :</strong> SCHOOL</td>
                                  <td><strong>Leave Days :</strong> 0.000</td>
  								<td colspan="2"><strong>SS No:</strong> <?php echo $employee->national_id; ?></td>
                              </tr>
                              </tbody>
                              </table>
                              <table class="table table-borderless" style="width:100%;margin:auto;text-align:left;" >
                          <tbody>
  							<tr>
                                  <td rowspan="2" colspan="2"><strong>Position :</strong> <?php echo $employee->position; ?></td>
                                  <td><strong>Grade :</strong> <?php echo $employee->grade; ?></td>
  								<td colspan="2"><strong>Period :</strong> <?php echo date('m/Y'); ?></td>
                              </tr>
                              </tbody>
                              </table>
                              <table class="table table-borderless" style="width:100%;margin:auto;text-align:left;" >
                              <thead>
                               <tr>
                                <th>DESCRIPTION</th>
                                <th>EARNINGS</th>
                                <th>DEDUCTIONS</th>
                                <th>YTD Amount</th>
                               </tr>
                              </thead>
                          <tbody>
                              <tr>
                              <td>GROSS PAY</td>
                              <td><?php echo $employee->salary; ?></td>
                              <td></td>
                              <td><?php echo $employee->salary; ?></td>
                              </tr>
                              <?php
                              $earnings = getEarnings($employee->position_id, $month, $year);
                             $earned = 0;
                              foreach($earnings as $earning):
                               $earned += $earning->amount;
                              ?>
                              <tr>
                                  <td><?php echo $earning->description; ?></td>
  								<td><?php echo $earning->amount; ?></td>
                                  <td></td>
                                  <td><?php echo $earning->amount; ?></td>
                              </tr>
                              <?php
                              endforeach;


                              $indvearnings = getIndividualEarning($employee->employee_id, $month, $year);
                             $taxed = 0;
                              foreach($indvearnings as $earning):
                               $earned += $earning->amount;
                               if($earning->is_taxable){
                               $taxed  += $earning->amount;
                             }
                              ?>
                              <tr>
                                  <td><?php echo $earning->description; ?></td>
                                 <td><?php echo $earning->amount; ?></td>
                                  <td></td>
                                  <td><?php echo $earning->amount; ?></td>
                              </tr>
                              <?php
                              endforeach;

                              $overtime =getCulculateOverTime($employee->employee_id, $month, $year);
                              if($overtime):
                              ?>
                              <tr>
                                <td>Overtime</td>
                                <td><?= $overtime; ?></td>
                                <td></td>
                                <td><?= $overtime; ?></td>
                              </tr>
                              <?php
                            endif;
                              $deducted = 0;
                              $paye = getPaye($employee->salary+$taxed, $overtime);
                              $payee = $employee->salary*$paye->rate-$paye->subtract;
                              ?>
                              <tr>
                               <td>PAYE</td>
                               <td></td>
                               <td><?php echo number_format($payee, 2); ?></td>
                               <td><?php echo number_format($payee, 2); ?></td>
                              </tr>
                              <?php
                              $advances = getAdvance($employee->employee_id, $month, $year);
                              $rmadv = 0;
                              if($advances):
                              foreach($advances as $advance):
                               $rmadv += $advance->amount;
                              ?>
                              <tr>
                                  <td><?php echo $advance->description; ?></td>
  								<td></td>
                                  <td><?php echo $advance->amount; ?></td>
                                  <td><?php echo $advance->amount; ?></td>
                              </tr>
                              <?php endforeach;
                              endif;
                               ?>
                              <?php
                              foreach($deductions as $deduction):
                               $deducted += $deduction->amount;
                              ?>
                              <tr>
                                  <td><?php echo $deduction->description; ?></td>
  								<td></td>
                                  <td><?php echo $deduction->amount; ?></td>
                                  <td><?php echo $deduction->amount; ?></td>
                              </tr>
                              <?php endforeach; ?>
                              <tr>
                               <th>TOTALS</th>
                               <?php

                                $sub = $employee->salary+$earned+$overtime;
                                ?>
                               <td><?php echo number_format($sub, 2); ?></td>
                               <td><?php echo $deducted+$payee+$rmadv; ?></td>
                               <td></td>
                              </tr>
  						</tbody>
  					</table>
                      <table class="table table-borderless" style="width:100%;margin:auto;text-align:left;" >
                          <tbody>
  							<tr>
                              <td>Pay Date</td>
                              <td><?php echo $employee->pay_day.'/'.date('m/Y'); ?> </td>
                       </tr>
                       </tbody>
                       </table>
                      <table class="table table-borderless" style="width:100%;margin:auto;text-align:left;" >
                          <tbody>
  							<tr>
                              <?php
                              $deducts = $deducted+$payee+$rmadv;
                               $total = $sub-$deducts;
                              ?>
                                  <td rowspan="2" colspan="2"><strong>Acc No. :</strong> <?php echo $employee->account; ?></td>
                                  <td><strong>NET PAY :</strong></td>
  								<td colspan="2"></td>
                                  <td><?php echo number_format($total, 2); ?></td>
                              </tr>
                              </tbody>
                              </table>

  				</div>
  			</div>
  		</div>
  	</div>
<br/>
    <?php endforeach; ?>
    <script type="text/javascript">
            function printSection(el){
                var getFullContent = document.body.innerHTML;
                var printsection = document.getElementById(el).innerHTML;
                document.body.innerHTML = printsection;
                window.print();
                document.body.innerHTML = getFullContent;
            }
        </script>
