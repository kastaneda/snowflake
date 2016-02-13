# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "ubuntu/trusty64"

  config.vm.network "forwarded_port", guest: 80, host: 8080

  config.ssh.shell = "bash -c 'BASH_ENV=/etc/profile exec bash'" 
  config.vm.provision "shell", path: "bin/install"
  config.vm.provision "shell", run: "always", path: "bin/test"
  config.vm.provision "shell", run: "always", path: "bin/motd"
end
