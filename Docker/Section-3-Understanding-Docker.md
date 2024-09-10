# Understanding Docker
- Dockers Containers and Virtual Machines (VMs) are not the same.
## Docker Container VS Virtual Machines (VMs)
### Virtual Machine
#### Architecture
- Infrastructure - can be a computer, a machine on a datacenter, etc.
- Host Operating System (OS)
- Hypervisors
    - Type 1: HyperKit (OS X) / Hyper-V (Win)
    - Type 2: VirtualBox / VMWare Workstation
- Guest OS
    - Each guest has its own OS
    - Each guest OS consumes CPU and Memory Resources
    - Each guest OS need to get their own copies of binaries and libraries
    - App - The source code of your application

### Docker Container
#### Architecture
- Infrastructure - can be a computer, a machine on a datacenter, etc.
- Host Operating System (OS)
- Docker Daemon
- Binaries and Libraries
    - App

#### Docker container shares the OS of the host which greatly makes docker more efficient than VMs since VM guest have their OS individually installed to them.
