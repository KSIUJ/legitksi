# legitk(s)i
Computer Science Students' Association identity card generator written in PHP using TCPDF for generating PDFs

## how to use
  - insert people (one per row) into web/config/ludzie.txt
  - insert expiration date into web/config/data.txt
  - run, click link and download PDF
  
## tuning
  - in web/legitksi.php you can change $cellWidth and $cellHeight to scale (note that in current config height is less by 1mm because with border it would be too big for a4 page)
  - $leftMargin and $topMargin are self explanatory; don't make them too small as printer may be unable to print such page
  - if you want more or less card per page you can change $cellsPerPage
  - for tuning position of text refer to TCPDF documentation and modify marked sections in main loop
