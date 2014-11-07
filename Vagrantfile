# -*- mode: ruby -*-
# vi: set ft=ruby :
VAGRANTFILE_API_VERSION = "2"
Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
config.vm.box_url = "https://vagrantcloud.com/avenuefactory/boxes/lamp/versions/4/providers/virtualbox.box"
config.vm.box = "avenuefactory/lamp"
config.vm.provision "shell", path: "bootstrap.sh"
config.vm.network "private_network", ip: "192.168.10.10"
config.vm.synced_folder ".", "/var/www/html"
end
