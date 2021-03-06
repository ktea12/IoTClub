<!---This is the second page of the website named as "Topic". It includes the information regarding Internet of Things with the use of vrious html markups. Different types of tags like table, lists, aside , section have been used as per the requirements. Some enhancements have also been made to make the page look more attractive.-->

<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="styles/style.css">
 <meta charset="UTF-8">
 <meta name="description" content="IoT Website">
 <meta name="keywords" content="HTML, CSS, IOT">
 <meta name="author" content="IoT Club">
 <title>IoT Description</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
        $page = "topic";
        include_once ("header.inc");
    ?>
<br>
<div class="image">

    <div class="box">
        <img src="images/Iot-3.jfif" alt="Iot"> <!--sourced from https://data-flair.training/blogs/how-iot-works/-->
    </div>
    <div class="box">
        <img src="images/IoT-4.jpg" alt="Iot"> <!--sourced from https://www.i-scoop.eu/internet-of-things-iot/iot-consumer-device-ownership-preferences/-->
    </div>
    <div class="box">
       <img src="images/IoT-1.jpg" alt="IoT"> <!--sourced from https://www.linkedin.com/pulse/internet-things-loved-feared-many-dairo-facundo-duarte?trk=read_related_article-card_title-->
    </div>
    <div class="box">
        <img src="images/IoT-6.jpg" alt="IoT"> <!--sourced from data:image/jpeg;base64,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-->
    </div>
    <div class="box">
       <img src="images/iot-5.jpg" alt="IoT"> <!--sourced from https://lh3.googleusercontent.com/6meo50GCalg7I9tY8lxyqKGjQJfKdlLS5JHW3K8pjtBwmCR9xVHwj7uJzH3eCj4EUDVZ=s113-->
    </div>
  
   
</div>
  <div class="div1">
       
        <section><h3 class="head2">What is 'IoT' ? It's Purpose, Function & Features</h3>
            <hr>
            <p class="size">Internet of Things, abbreviated to IoT, refers to the ecosystem of networks between physical devices simultaneously collecting and sharing data. Despite the name, IoT devices need only be connected to a network (not exclusively the Internet) and individually addressable to be considered as such.
                Due to a lack of universal direction within the Internet of Things, it is difficult to pin-point its singular direction, however, it???s increasingly proficient self reporting and functionality in real time is universally beneficial. This majorly improves efficiency, reducing the need for human intervention. For example, where once a technicians report may have been required to rectify a product???s fault, virtual mass error reports may be collected as an alternative, and for a fraction of the cost.
                The convergence of multiple network connected technologies has also increased the ability for industries to share technologies with one another. This is exemplified in a meteorology research centre???s ability to send data in real time to weather stations, or even to the population directly.</p>
        
        </section>
        <!-- Moved center to the css file as we aren't meant to have css built into html files.-->
        <aside>
           <figure id = "topic_ashton">
            <img src="images/kevin.jpg" alt="Kevin Ashton" width="150" height="200"> <!--sourced from https://www.hanser-literaturverlage.de/autor/kevin-ashton/-->
                <figcaption>Kevin Ashton: Developer of IoT</figcaption>
            </figure>
                The person who coined the term "Internet of Things", what we know as of today. He came out with this name because of the ever growing vogue of Internet among people in the 1990s. Thus, in order to advocate his project work while working in a supply chain management company named 'Procter and Gamble' , he named the term "Internet of Things".
                
        </aside>

        <section><h3 class="head2">Term Origin - Leading to it's Development</h3>
            <hr>
            <p class="size">Although conceptualised in 1832, the development of the IoT began with the invention of the internet and its predecessors in the late 1960s. The term ???Internet of Things??? itself was first used by Peter T. Lewis and later coined by Kevin Ashton of Procter & Gamble in 1999.</p>
                <p class="size"> Following are the key forces which led to the development of Internet of Things:</p>
                <ol type="1">
                    <li>Electromagnetic Telegraph</li>
                    <li>ARPANET</li>
                    <li>Beginnings of TCP/IP</li>
                    <li>Domain Name System</li>
                    <li>Development in World Wide Web</li>
                </ol>
                <p class="size">Further elaborations on great ideas leading to the development of IoT: </p>
                <ul id="square">
                <li>Considering the first IoT device made by John Romkey,a toaster, which could be turned on and off over the Internet using TCP/IP protocols and information base systems(SNMP MIB)</li>
                <li>inTouch Project developed at MIT by Scott Brave, Andrew Dahley, and Professor Hiroshi Ishii was an elaborative approach to this notion.</li>
                </ul>
                <p class="size">Finally, Kevin Ashton himself mentioned:</p>
                <cite>"I could be wrong, but I'm fairly sure the phrase "Internet of Things" started life as the title of a presentation I made at Procter & Gamble (P&G) in 1999. Linking the new idea of RFID in P&G's supply chain to the then-red-hot topic of the Internet was more than just a good way to get executive attention. It summed up an important insight which is stil often misunderstood."</cite>
        </section>
    

        <section><h3 class="head2">Administration & Management</h3>
            <hr>
            <p class="size">Whilst network administrators manage IoT devices connected to their private network, the IoT pertaining to the world wild web (WWW) has no sole manager. Ultimately, the Internet of Things is a self-regulated ecosystem, with no sole or oligarchical supervisor. It is this freedom to connect to the IoT that allows and has allowed its rapid expansion.
                Although governments have attempted to minimize hacking in the name of Cybersecurity, legislative managemen of the IoT has proved minimally effective. Prosecution of cybercriminals, whilst common, occurs at a rate much lower than crimes are being commited by perpetrators. Defence agencies, such as the FBI in 2018, have given various security warnings pertaining specifically to the dangers that the IoT poses to one's household.
                Said warnings from authorative bodies may prove helpful for those who actively follow recommendations- realistically, global management and administration of the IoT is a task proving to be almost impossible.  </p>
        </section>

        <section><h3 class="head2">Growth & Decline</h3>
            <hr>
            <p class="size">The IoT has experienced exponential growth, reporting a 31% increase in 2019. Since its first conception, the IoT has been subject to consistent advancements in its technology/devices, likely correlated to the growth in world wide population. Analysts have predicted a collective 41.6 billion IOT connected devices by the year 2025.
                Increasing automation is likely to increase growth of the IoT, however faster connection speeds may see a reduction in hardware and an increase in streaming, exemplified in XBox???s ???remote play??? feature.
                Various concerns have arisen from the growth of the IOT, majorly those of security and privacy of individuals. Due to monetary exploitation of information available on the IOT, the population has been and will be subjected to a steep increase in cybercrime.It's time to get prepared and start evolving. The internet of things will cause a paradigm shift in human nature!</p>
        </section>
       
        <section><h3 class="head2">Related Technologies</h3>
            <hr>
            <p class="size">Although Wi-Fi itself is a subset of the IoT, both networks reflect the functions of the other, allowing communication between devices connected to the same network and through the internet. A Wi-Fi network is often governed by the strength of its router???s signal, whereas the all encapsulating nature of the IoT, deems it practically limitless, only requiring a network connection.</p>
        </section>
        <section><h3 class="head2">IoT Device & Explanation</h3>  
            <table id="border5">
                <tr>
                    <th>Device</th>
                    <th>Industry</th>
                    <th>Description</th>
                </tr>
                <tr>
                    <td>Router</td>
                    <td>Networking</td>
                    <td>Device that organises communication between computers</td>
                </tr>
                <tr>
                    <td>Shark Tag</td>
                    <td>Marine Conservation</td>
                    <td>Tracker imbedded into sharks for location tracking in the wild</td>
                </tr>
                <tr>
                    <td>Smart Fridge</td>
                    <td>Home Appliances</td>
                    <td>Fridge that allows application use through Wi-Fi connection... also keeps food cold</td>
                </tr>
                <tr>
                    <td>Airpods</td>
                    <td>Audio Devices</td>
                    <td>Audio device that streams files from a mobile phone, computer etc.</td>
                </tr>
                <tr>
                    <td>PS5</td>
                    <td>Gaming</td>
                    <td>Interactive console that streams video and audio and downloads game files for entertainment purposes</td>
                </tr>
                <tr>
                    <td>GPS</td>
                    <td>Navigation</td>
                    <td>Satellite dependent system that tracks ones location, guiding them to another</td>
                </tr>
                <tr>
                    <td>iPad Stylus</td>
                    <td>Graphic Design</td>
                    <td>Interactive stylus connecting to an apple tablet through bluetooth connectivity</td>
                </tr>
            </table>
        </section>
        
        <section><h3 class="head2">WIRELESS Technologies behind IoT :</h3>  
            <hr>
            <dl id="dl">
            <dt>NB-IoT :</dt>
            <dd>Known as Narrowband Internet of Things, it is a low-power wide area network based on radio technology and used in cellular applications and services.</dd>
            <dt>LTE-M :</dt>
            <dd>Known as Long Term Evolution Machine Type Communication, it is a 4G cellular network system that has two versions Cat-M1 and Cat-M2.</dd>
            <dt>LoRaWAn :</dt>
            <dd>It is a technology standard that was made by Lora Alliance and is also currently handled by them. It is used in international communications.</dd>
            <dt>Sigfox :</dt>
            <dd>It is a software based communications solution, wherein all the complexity in the network system is stored in the Cloud and not in the devices.</dd>
            </dl>
        </section>
        <section><h3 class="head2">Reading in some befenits of IoT</h3>
            <hr>
            <div class="zoom"><img src="images/IoTbenefits.png" alt="IoT Benefits" width="1080" height="720"></div>
        </section>
    </div>
    <?php
        include_once "footer.inc"?>;
</body>
</html>

<!--Sources for gathered information include
    https://www.zdnet.com/article/what-is-the-internet-of-things-everything-you-need-to-know-about-the-iot-right-now/
    https://www.i-scoop.eu/internet-of-things-iot/internet-of-things-what-definition/
    https://www.postscapes.com/iot-history/?msclkid=a33d0dd2af2311eca45fa07ba6ef2039
    https://www.intelligenthq.com/the-development-of-the-internet-of-things/?msclkid=a33beb11af2311ecaa220704b9020877-->
