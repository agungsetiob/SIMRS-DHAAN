<?php
namespace Aplikasi\V1\Rpc\Tentang;

use DBService\RPCResource;

class TentangController extends RPCResource
{
    public function __construct($controller) {
        $this->authType = self::AUTH_TYPE_LOGIN;        
    }

    public function changelogAction() {
        $path = str_replace("webservice", "", realpath("."));
        $content = file_get_contents($path."CHANGELOG");
        
        $content = str_replace("# CHANGELOG", "", $content);
        $versions = explode("## ", $content);
        $realContent = "<div style='background: rgb(40, 44, 52); color: #abb2bf; font-family: sans-serif; font-size: 16px;'>";
        foreach($versions as $ver) {
            $changes = explode("\n", $ver);
            $i = 0;
            $cnt = count($changes);
            foreach($changes as &$cha) {                                
                if(trim($cha) == "" || trim($cha) == "\n") {
                    $cnt--;                        
                    if($i == $cnt) $realContent .= "</ul>";
                    continue;
                }
                if($i == 0) $cha = "<div><span style='color: #61afef; font-weight: bold;'>".$cha."</span></div>";
                $ul = "";
                $ulEnd = "";
                if($i == 1) $ul = "<ul>";
                if($i == ($cnt - 1)) $ulEnd = "</ul>";
                if($i > 0) $cha = $ul."<li>".str_replace("- ", "", $cha)."</li>".$ulEnd;
                $i++;
            }        
            $realContent .= implode($changes);
        }

        $realContent .= "</div>";

        $response = $this->downloadDocument($realContent, "text/html", "html", "changelog", false);

        return $response;
    }

    public function kontakAction() {
        $content .= '<span style="font-size: 21px">'.
            '<b>Syarat mendapatkan SIMRS GOS:</b><br>'.
            '    1. RS sudah mempunyai infrastruktur IT (Jaringan, Komputer dan Server)<br>'.
            '    2. RS Mempunyai minimal 1 orang SDM IT (programmer)<br><br>'.
            '    <b>Alur mendapatkan SIMRS GOS:</b><br>'.
            '    1. Mengajukan permohonan penggunaan SIMRS GOS kepada Sesditjen Pelayanan Kesehatan<br>'.
            '    2. Pengisian<i> self assessment </i>kesiapan infrastruktur dan SDM RS<br>'.
            '    3. Pemberian surat izin penggunaan oleh Sesditjen Pelayanan Kesehatan<br>'.
            '    4. Penyerahan dan training SIMRS GOS kepada RS<br>'.
            '    5. Perawatan dan pengembangan SIMRS dilakukan oleh RS masing-masing (internal RS atau pihak ketiga)<br><br>'.
            
            
            '   <b>Informasi lebih lanjut dapat menghubungi SubbagInformasi dan Evaluasi PI Yankes<br>'.
            '    <span class="fa fa-email">Email: infomonev.yankes@gmail.com</span><br>'.
            '    Telepon: 0215261813 (fax), 021 5201590 ext 1303<b>'.
            '</span>';

        $response = $this->downloadDocument($content, "text/html", "html", "kontak", false);

        return $response;
    }

    public function contributorAction() {
        $contributors = [
            "owner" => [
                "name" => "Kementerian Kesehatan Republik Indonesia",
                "teams" => [
                    [ "id" => 1, "name" => "Haidar Istiqlal, S.Kom", "role" => "" ]
                ]
            ],
            "author" => [
                "name" => "SIMpel Development",
                "teams" => [
                    [ "id" => 1, "name" => "Poentoro, S.Si., M.Kom", "role" => "Project Manager"],
                    [ "id" => 2, "name" => "Hariansyah Erwin Noer, S.Kom", "role" => "Development Team" ],
                    [ "id" => 3, "name" => "Asrang", "role" => "Development Team" ],
                    [ "id" => 4, "name" => "Munawir, S.Kom", "role" => "Development Team" ],
                    [ "id" => 5, "name" => "Budirman, A.Md.Kom", "role" => "Development Team" ],
                    [ "id" => 6, "name" => "Zaldi, A.Md.Kom", "role" => "Development Team" ],
                    [ "id" => 7, "name" => "Asmadi, A.Md.Kom", "role" => "Development Team" ],
                    [ "id" => 8, "name" => "Muhammad Rizal Ibrahim, A.Md.Kom", "role" => "Development Team" ],
                    [ "id" => 9, "name" => "Andi Muhammad Ridwan Ahmad, A.Md.Kom", "role" => "Development Team" ],				
                    [ "id" => 10, "name" => "Muchtamar, S.Sos", "role" => "Bussiness Requirement Team" ],
                    [ "id" => 11, "name" => "Aris Munandar Arsyad, SKM", "role" => "Bussiness Requirement Team" ],
                    [ "id" => 13, "name" => "Faizal, S.Sos", "role" => "Bussiness Requirement Team" ],				
                    [ "id" => 12, "name" => "Nur Alamsyah, SE", "role" => "Quality Assurance Team" ],
                    [ "id" => 14, "name" => "Saddam Hussain, S.Pd", "role" => "Quality Assurance Team" ],
                    [ "id" => 15, "name" => "Achmad Zarkasyi, A.Md.Kom", "role" => "Quality Assurance Team" ],				
                    [ "id" => 16, "name" => "Putry Dwi Sulistyarini, S.Si,Apt", "role" => "Finance" ],				
                    [ "id" => 17, "name" => "Nur Alam", "role" => "Support Team" ],
                    [ "id" => 18, "name" => "Muhammad Abdi, S.Kom", "role" => "Support Team" ],
                ]
            ],
            "contributors" => [
                [
                    "title" => "Logo Design",
                    "teams" => [
                        [ "id" => 1, "name" => "Fadri Apriliyandi", "role" => "IT RS Umum Petukangan Jakarta Selatan" ]
                    ]
                ]
            ]
        ];
        
        $content .= "<div style='background: rgb(40, 44, 52); color: #abb2bf; text-align: center; font-family: sans-serif; font-size: 16px;'>"
            ."<br/><br/>"
            ."<div>Owner</div>"
            ."<div><span style='color: #d7ba7d; font-weight: bold; font-size: 17px'>".$contributors["owner"]["name"]."</span></div>"
            ."<br/>"
            ."<div>Author</div>"
            ."<div><span style='color: #d7ba7d; font-weight: bold;'>".$contributors["author"]["name"]." Teams</span></div>";
            //."<div>Teams</div>";
            foreach($contributors["author"]["teams"] as $team) {
                $content .= "<div>"
                    ."<span style='color: #61afef; font-weight: bold;'>".$team["name"]."</span>"
                    ."<span> (".$team["role"].")</span>"
                    ."</div>";
            }
        $content .= "<br/>";
            foreach($contributors["contributors"] as $contibutor) {
                $content .= "<div>Contributions to <span style='color: #d7ba7d; font-weight: bold;'>".$contibutor["title"]."</span></div>";
                if(count($contibutor["teams"]) == 1)
                    $content .= "<div>"
                        ."<span style='color: #61afef; font-weight: bold;'>".$contibutor["teams"][0]["name"]."</span>"
                        ."<span> (".$contibutor["teams"][0]["role"].")</span>"
                        ."</div>";
            }
        $content .= "<br/>"           
            ."</div>";

        $response = $this->downloadDocument($content, "text/html", "html", "kontak", false);

        return $response;
    }
}
