<?
require_once($_SERVER["DOCUMENT_ROOT"].'/services/templates/main/header.php');
?>

          <div id="left_col" class="f_col">
          <nav>
            <ul class="tree_menu">
                <li id="n1_l" class="node"><span data-href="#"><i id="n1_i" class="fas fa-caret-right"></i><i class="fas fa-box"></i>Node 1</span>
		<ul class="dn">
                    <li><div data-href="#"><i class="fas fa-clone"></i>Первый подраздел</div></li>
                    <li id="n1_1_l" class="node"><span data-href="#"><i id="n1_1_i" class="fas fa-caret-right"></i><i class="fas fa-box"></i>Второй подраздел</span>
                    <ul class="dn">
                        <li><div data-href="#"><i class="fas fa-clone"></i>Первый подраздел</div></li>
                        <li><div data-href="#"><i class="fas fa-clone"></i>Второй подраздел</div></li>
                        <li><div data-href="#"><i class="fas fa-clone"></i>Третий подраздел</div></li>    
                    </ul>
                    </li>
                    <li><div data-href="#"><i class="fas fa-clone"></i><span class="click" onclick="USER.auth();">Третий подраздел</span></div></li>
		</ul>
                </li>
                <li id="n2_l" class="node"><span data-href="#"><i id="n2_i" class="fas fa-caret-right"></i><i class="fas fa-box"></i>Node 2</span>
                <ul class="dn">
                    <li><div data-href="#"><i class="fab fa-buffer"></i>Первый подраздел</div></li>
                    <li><div data-href="#"><i class="fab fa-buffer"></i>Второй подраздел</div></li>
                    <li><div data-href="#"><i class="fab fa-buffer"></i>Третий подраздел</div></li>
		</ul>
                </li>
                <li id="n3_l" class="node"><span data-href="#"><i id="n3_i" class="fas fa-caret-right"></i><i class="fas fa-box"></i>Ресурсы</span>
                    <ul class="dn">
                    <li><div data-href="/resources/fonts/icommon/demo.html"><i class="fas fa-book"></i>Icommon fonts icons demo</div></li>
                    <li><div data-href="#"><i class="fas fa-book"></i>Второй подраздел</div></li>
                    <li><div data-href="#"><i class="fas fa-book"></i>Третий подраздел</div></li>
		</ul>
                </li>    
            </ul>
          </nav>
          </div>
          <div id="center_col" class="f_col">
              <header>
              Тест
              </header>
              <div id="main_content">
                  <div id="f1" data-app="Battery" class="flow_container">
                  </div>
                  <script src="/services/modules/pps_devices/model.js"></script>
                  <div id="f2" class="flow_container">
                      <div id="f2_cont">F2</div>
                          
                  </div>
                  
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.js"></script>
                  
                  <div id="f3" class="flow_container">
                  
                  <canvas id="myChart" width="400" height="400"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
                      
                  </div>
 

                <div id="f4" class="flow_container">
                    

                </div>
                
                
                
                <div id="f5" class="flow_container">
 
                </div>
                 
              </div>
              
<div id="f6" class="flow_container">

                      
  
                  </div>
                    
              
              
          </div>
          <div id="right_col" class="f_col">Right_col</div>
<?
require_once($_SERVER["DOCUMENT_ROOT"].'/services/templates/main/footer.php');
?>
