# ci-dns-creator-cloudflare
Simple Codeigniter DNS Creator Cloudflare PHP API
# Installation
Need:
* Cloudflare
* Web Server PHP
* Domain Name

```
git clone https://github.com/rzengineer/ci-dns-creator-cloudflare.git
```
or download as a zip archive and upload/extract to your web server.
# Edit this file application/controllers/Dns.php
```
if (!empty($this->input->post('name')) and !empty($this->input->post('content'))) {
				$name=$this->input->post('name');
				$content=$this->input->post('content');
				$zoneid = "Zone ID";
				$dns = new Cloudflare\Zone\Dns('Your Email', 'Your Global API');
				$response=$dns->create($zoneid, 'A', $this->input->post('name') . ".defuza.xyz", $this->input->post('content'), 1);
			if ($response) {
					echo "<div class='alert alert-success alert-dismissable'>Your hostname <b> $name.defuza.xyz</b> is now online!</div>";
				}else{
					echo "<div class='alert alert-danger alert-dismissable'>Your hostname <b>  $name.defuza.xyz</b> could not be created!</div>";
			}
		}
```
in the application/controllers/Dns.php change zone id to your cloudflare zone id , change Your Email to your email cloudflare, and change Your Global Api to your global api cloudflare. change defuza.xyz to your domain name.
# Made Using
* [Adminlte](https://github.com/almasaeed2010/AdminLTE)
* [Cloudflare PHP API](https://github.com/jamesryanbell/cloudflare)
# Reference
* [Cloudflare DNS Creator](https://github.com/reckr/cloudflare-dns-creator)
