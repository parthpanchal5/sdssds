<?php 
              if($row[7] <= 4){
                echo "<td><span class='chips rounded red white-text' style='padding: 6px;'>Out of stock</span></td>";
              }else if($row[7] >= 5 && $row[7] <= 50){
                echo "<td><span class='chips rounded yellow darken-4 white-text' style='padding: 6px;'>Low Stock</span></td>";
              }else if($row[7] >= 51 && $row[7] <= 100){
                echo "<td><span class='chips rounded blue darken-1 white-text' style='padding: 6px;'>Few left</span></td>";
              }else if($row[7] >= 101 && $row[7] <= 350){
                echo "<td><span class='chips rounded green darken-2 white-text' style='padding: 5px;'>Available</span></td>";
              }
            ?>