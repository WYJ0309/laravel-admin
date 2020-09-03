<!DOCTYPE html>
<html>
@component('front.component',['title'=>'网站标题','keyword'=>'关键词','description'=>'描述'])@endcomponent
<body>
<header>
    @include('front.nav')
</header>
<div class="product-all-header">
    <div class="header-content">
        <h1>网站内容标签</h1>
        <p>各文章的关键词，标题提取词，内容提取词</p>
    </div>
</div>
<div class="product-all-content">
    <div class="product-content" id="p1">
        <div class="title" id="title1">计算</div>
        <div class="tips-content">
            <div class="tips col-sm-4">
                <a href="#">
                    <i class="inco"><span class="icons-product-md ecs"></span></i>
                    <div class="tips-title">弹性云服务器</div>
                    <div class="tips-info">弹性云服务器（Elastic Cloud Server）是一种可随时自助获取、可弹性伸缩的云服务器，帮助用户打造可靠、安全、灵活、高效的应用环境，确保服务持久稳定运行，提升运维效率</div>
                </a>
            </div>
            <div class="tips col-sm-4">
                <a href="#">
                    <i class="inco"><span class="icons-product-md gpu"></span></i>
                    <div class="tips-title">GPU加速云服务器</div>
                    <div class="tips-info">GPU加速云服务器（GPU Accelerated Cloud Server, GACS）能够提供优秀的浮点计算能力，从容应对高实时、高并发的海量计算场景。P系列适合于深度学习，科学计算，CAE等；G系列适合于3D动画渲染，CAD等</div>
                </a>
            </div>
            <div class="tips col-sm-4">
                <a href="#">
                    <i class="inco"><span class="icons-product-md fcs"></span></i>
                    <div class="tips-title">FPGA加速云服务器</div>
                    <div class="tips-info">FPGA加速云服务器(FPGA Accelerated Cloud Server, FACS)提供FPGA开发和使用的工具及环境，让用户方便地开发FPGA加速器和部署基于FPGA加速的业务，为您提供易用、经济、敏捷和安全的FPGA云服务</div>
                </a>
            </div>
            <div class="tips col-sm-4">
                <a href="#">
                    <i class="inco"><span class="icons-product-md bms"></span></i>
                    <div class="tips-title">裸金属服务器</div>
                    <div class="tips-info">裸金属服务器（Bare Metal Server）为您和您的企业提供专属的云上物理服务器，为核心数据库、关键应用系统、高性能计算业务提供卓越的计算性能以及数据安全，结合云中资源的弹性优势，可灵活申请，按需使用</div>
                </a>
            </div>
            <div class="tips col-sm-4">
                <a href="#">
                    <i class="inco"><span class="icons-product-md deh"></span></i>
                    <div class="tips-title">专属主机</div>
                    <div class="tips-info">专属主机（Dedicated Host ）是指其上创建云服务器的所有资源完全供您专用的物理服务器，满足您对计算的隔离和性能的要求，并支持自带软件许可功能</div>
                </a>
            </div>

            <div class="tips col-sm-4">
                <a href="#">
                    <i class="inco"><span class="icons-product-md as"></span></i>
                    <div class="tips-title">弹性伸缩</div>
                    <div class="tips-info">弹性伸缩（Auto Scaling）可根据用户的业务需求和预设策略，自动调整计算资源，使云服务器数量自动随业务负载增长而增加，随业务负载降低而减少，保证业务平稳健康运行</div>
                </a>
            </div>
            <div class="tips col-sm-4">
                <a href="#">
                    <i class="inco"><span class="icons-product-md ims"></span></i>
                    <div class="tips-title">镜像服务</div>
                    <div class="tips-info">镜像是用于创建弹性云服务器或裸金属服务器的模板。镜像服务（Image Management Service）提供镜像管理能力。使用弹性云服务器或外部文件创建系统盘镜像。同时，可以使用弹性云服务器或云服务器备份创建可带数据盘的整机镜像</div>
                </a>
            </div>
            <div class="tips col-sm-4">
                <a href="#">
                    <i class="inco"><span class="icons-product-md cce"></span></i>
                    <div class="tips-title">云容器引擎</div>
                    <div class="tips-info">云容器引擎（Cloud Container Engine）提供高可靠高性能的企业级容器应用管理服务，支持Kubernetes社区原生应用和工具，简化云上自动化容器运行环境搭建</div>
                </a>
            </div>

            <div class="tips col-sm-4">
                <a href="#">
                    <i class="inco"><span class="icons-product-md cci"></span></i>
                    <div class="tips-title">云容器实例</div>
                    <div class="tips-info">华为云容器实例（Cloud Container Instance）服务是基于Kubernetes的Serverless Container（无服务器容器）引擎，兼容Kubernetes和Docker的原生接口。用户不再需要关注集群和服务器，通过简单的三步配置，即可快速创建容器负载</div>
                </a>
            </div>
            <div class="tips col-sm-4">
                <a href="#">
                    <i class="inco"><span class="icons-product-md functiongraph"></span></i>
                    <div class="tips-title">函数工作流</div>
                    <div class="tips-info">函数工作流（FunctionGraph）是一项基于事件驱动的函数托管计算服务。通过函数工作流，只需编写业务函数代码并设置运行的条件，无需配置和管理服务器等基础设施，函数以弹性、免运维、高可靠的方式运行。此外，按函数实际执行资源计费，不执行不产生费用</div>
                </a>
            </div>
        </div>
    </div>
    <div class="product-content" id="p2">
        <div class="title" id="title2"> 存储</div>
        <div class="tips-content">
            <div class="tips col-sm-4">
                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md obs"></span>
                    </i>
                    <div class="tips-title">对象存储服务</div>
                    <div class="tips-info">稳定、安全、高效、易用的云存储服务，具备标准Restful API接口，可存储任意数量和形式的非结构化数据，提供99.999999999%的数据可靠性</div>
                </a>
            </div>
            <div class="tips col-sm-4">
                <a href="#">
                    <i class="inco"><span class="icons-product-md evs"></span></i>
                    <div class="tips-title">云硬盘</div>
                    <div class="tips-info">云硬盘（Elastic Volume Service）是一种为ECS、BMS等计算服务提供持久性块存储的服务，通过数据冗余和缓存加速等多项技术，提供高可用性和持久性，以及稳定的低时延性能。您可以对云硬盘做格式化、创建文件系统等操作，并对数据做持久化存储</div>
                </a>
            </div>
            <div class="tips col-sm-4">
                <a href="#">
                    <i class="inco"><span class="icons-product-md vbs"></span></i>
                    <div class="tips-title">云硬盘备份</div>
                    <div class="tips-info">云硬盘备份（Volume Backup Service）为云硬盘创建在线备份，无需关机/重启。针对病毒入侵、人为误删除、软硬件故障等场景，可将数据恢复到任意备份点</div>
                </a>
            </div>
            <div class="tips col-sm-4">
                <a href="#">
                    <i class="inco"><span class="icons-product-md csbs"></span></i>
                    <div class="tips-title">云服务器备份</div>
                    <div class="tips-info">云服务器备份（Cloud Server Backup Service）为云服务器下所有云硬盘创建一致性在线备份，无需关机。针对病毒入侵、人为误删除、软硬件故障等场景，可将数据恢复到任意备份点</div>
                </a>
            </div>
            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md cdn"></span>
                    </i>
                    <div class="tips-title">内容分发网络 CDN</div>
                    <div class="tips-info">内容分发网络（CDN）将源站内容分发至靠近用户的加速节点，使用户可以就近获得所需的内容，解决Internet网络拥挤的状况，提高用户访问的响应速度和成功率，从而提升您业务的使用体验</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md sdrs"></span>
                    </i>
                    <div class="tips-title">存储容灾服务</div>
                    <div class="tips-info">存储容灾服务（Storage Disaster Recovery Service）提供跨可用区RPO=0的虚拟机级容灾保护，可大幅降低企业容灾TCO，简化容灾流程。当生产站点故障时，用户可在容灾站点迅速恢复业务，极大缩短业务中断时间，减少损失</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md sfs"></span>
                    </i>
                    <div class="tips-title"> 弹性文件服务</div>
                    <div class="tips-info">弹性文件服务（Scalable File Service）为用户的弹性云服务器（ECS）提供一个完全托管的共享文件存储，符合标准文件协议（NFS），能够弹性伸缩至PB规模，具备可扩展的性能，为海量数据、高带宽型应用提供有力支持</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md des"></span>
                    </i>
                    <div class="tips-title">数据快递服务</div>
                    <div class="tips-info">数据快递服务（Data Express Service）是面向TB或PB级数据上云的传输服务，使用Teleport设备或物理存储介质（USB、eSATA接口的磁盘等）向华为云传输大量数据。解决了上云带宽昂贵、传输时间长的难题</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md lsa"></span>
                    </i>
                    <div class="tips-title">直播加速</div>
                    <div class="tips-info">直播加速产品结合了流媒体技术和 CDN 技术，通过智能负载均衡系统将用户的直播访问定位至最佳节点，有效避开了网络中的拥塞，实现用户最快访问，为终端用户提供低时延、高流畅的视频直播加速体验</div>
                </a>

            </div>

        </div>
    </div>
    <div class="product-content" id="p3">

        <div class="title" id="title3"> 网络</div>

        <div class="tips-content">
            <!-- product card -->

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md vpc"></span>
                    </i>
                    <div class="tips-title">虚拟私有云</div>
                    <div class="tips-info">虚拟私有云（Virtual Private Cloud）是用户在华为云上申请的隔离的、私密的虚拟网络环境。用户可以自由配置VPC内的IP地址段、子网、安全组等子服务，也可以申请弹性带宽和弹性IP搭建业务系统</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md elb"></span>
                    </i>
                    <div class="tips-title">弹性负载均衡</div>
                    <div class="tips-info">弹性负载均衡（ Elastic Load Balance）将访问流量自动分发到多台云服务器，扩展应用系统对外的服务能力，实现更高水平的应用容错</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md nat"></span>
                    </i>
                    <div class="tips-title">NAT网关</div>
                    <div class="tips-info">NAT网关（NAT Gateway）能够为VPC内的弹性云服务器提供SNAT和DNAT功能，通过灵活简易的配置，即可轻松构建VPC的公网出入口</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md eip"></span>
                    </i>
                    <div class="tips-title">弹性公网IP</div>
                    <div class="tips-info">弹性公网IP（Elastic IP）提供独立的公网IP资源，包括公网IP地址与公网出口带宽服务。可以与弹性云服务器、裸金属服务器、虚拟IP、弹性负载均衡、NAT网关等资源灵活地绑定及解绑。拥有多种灵活的计费方式，可以满足各种业务场景的需要</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md dc"></span>
                    </i>
                    <div class="tips-title">云专线</div>
                    <div class="tips-info">云专线（Direct Connect）用于搭建用户本地数据中心与华为云VPC之间高速、低时延、稳定安全的专属连接通道，充分利用华为云服务优势的同时，继续使用现有的IT设施，实现灵活一体，可伸缩的混合云计算环境</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md vpn"></span>
                    </i>
                    <div class="tips-title">虚拟专用网络</div>
                    <div class="tips-info">虚拟专用网络（Virtual Private Network）用于搭建用户本地数据中心与华为云VPC之间便捷、灵活，即开即用的IPsec加密连接通道，实现灵活一体，可伸缩的混合云计算环境</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md dns"></span>
                    </i>
                    <div class="tips-title"> 云解析服务</div>
                    <div class="tips-info">云解析服务（Domain Name Service）提供高可用，高扩展的权威DNS服务和DNS管理服务，把人们常用的域名或应用资源转换成用于计算机连接的IP地址，从而将最终用户路由到相应的应用资源上</div>
                </a>

            </div>

        </div>
    </div>
    <div class="product-content" id="p4">

        <div class="title" id="title4">数据库</div>

        <div class="tips-content">
            <!-- product card -->

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md mysql"></span>
                    </i>
                    <div class="tips-title">云数据库 MySQL</div>
                    <div class="tips-info">MySQL是全球最受欢迎的开源数据库之一，性能卓越，搭配LAMP，成为WEB开发的高效解决方案。 云数据库MySQL拥有即开即用、稳定可靠、安全运行、弹性伸缩、轻松管理、经济实用等特点，让您更加专注业务发展</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md pg"></span>
                    </i>
                    <div class="tips-title">云数据库 PostgreSQL</div>
                    <div class="tips-info">PostgreSQL是一种典型的开源关系型数据库，在保证数据可靠性和完整性方面表现出色，支持互联网电商、地理位置应用系统、金融保险系统、复杂数据对象处理等应用场景</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md mssql"></span>
                    </i>
                    <div class="tips-title">云数据库 SQL Server</div>
                    <div class="tips-info">Microsoft SQL Server 是世界上最受欢迎的商用关系型数据库之一，集成各类管理开发工具。云数据库 SQL Server为微软正版授权，完美支持基于Windows架构的应用程序</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md dds"></span>
                    </i>
                    <div class="tips-title">文档数据库服务</div>
                    <div class="tips-info">文档数据库DDS完全兼容MongoDB协议，在华为云高性能、高可用、高安全、可弹性伸缩的基础上，提供了一键部署，弹性扩容，容灾，备份，恢复，监控等服务能力。目前支持副本集（ReplicaSet）和分片集群（Sharding）两种部署架构</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md dcs"></span>
                    </i>
                    <div class="tips-title">分布式缓存服务 Redis</div>
                    <div class="tips-info">分布式缓存服务是兼容Redis、IMDG的内存数据库服务，基于双机热备的高可用架构，提供单机、主从、集群等丰富类型的缓存类型，满足用户高读写性能及快速数据访问的业务诉求</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md dcsmem"></span>
                    </i>
                    <div class="tips-title">分布式缓存服务 Memcached</div>
                    <div class="tips-info">Memcached是一个高性能、分布式的缓存系统，可有效加快应用速度、提升应用的可扩展性，降低对后端数据库的性能依赖。分布式缓存 Memcached 是兼容Memcached的内存数据库服务，提供了双机热备、故障恢复、无忧运维等能力，满足用户应用加速以及高读写性能的业务诉求</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md ddm"></span>
                    </i>
                    <div class="tips-title">分布式数据库中间件</div>
                    <div class="tips-info">分布式数据库中间件（Distributed Database Middleware）是解决数据库容量、性能瓶颈和分布式扩展问题的中间件服务，提供分库分表、读写分离、弹性扩容等能力，应对海量数据的高并发访问场景，有效提升数据库读写性能</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md drs"></span>
                    </i>
                    <div class="tips-title">数据复制服务</div>
                    <div class="tips-info">数据复制服务（Data Replication Service，简称为DRS）是一种易用、稳定、高效，用于数据库在线迁移和数据库实时同步的云服务。DRS围绕云数据库，降低了数据库之间数据 流通的复杂性，有效地帮助您减少数据传输的成本</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md das"></span>
                    </i>
                    <div class="tips-title">数据管理服务</div>
                    <div class="tips-info">数据管理服务（Data Admin Service），简称DAS，是一款专业的简化数据库管理工具，提供业界领先的可视化操作界面，大幅提高工作效率，让数据管理变得既安全又简单</div>
                </a>

            </div>

        </div>
    </div>
    <div class="product-content" id="p5">

        <div class="title" id="title5"> 安全</div>

        <div class="tips-content">
            <!-- product card -->

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md antiddos"></span>
                    </i>
                    <div class="tips-title">Anti-DDoS流量清洗</div>
                    <div class="tips-info">Anti-DDoS流量清洗为华为云内资源（弹性云服务器、弹性负载均衡），提供网络层和应用层的DDoS攻击防护（如泛洪流量型攻击防护、资源消耗型攻击防护），并提供攻击拦截实时告警，有效提升用户带宽利用率，保障业务稳定可靠</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md aad"></span>
                    </i>
                    <div class="tips-title">DDoS高防</div>
                    <div class="tips-info">DDoS高防是针对互联网服务器（包括非华为云主机）在遭受大流量DDoS攻击后导致服务不可用的情况下，推出的付费增值服务，用户可以通过配置高防IP，将攻击流量引流到高防IP清洗，确保源站业务稳定可靠</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md waf"></span>
                    </i>
                    <div class="tips-title">Web应用防火墙</div>
                    <div class="tips-info">Web应用防火墙（Web Application Firewall）对网站业务流量进行多维度检测和防护，结合深度机器学习智能识别恶意请求特征和防御未知威胁，阻挡诸如 SQL注入或跨站脚本等常见攻击，避免这些攻击影响Web应用程序的可用性、安全性或消耗过度的资源，降低数据被篡改、失窃的风险</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md vss"></span>
                    </i>
                    <div class="tips-title">漏洞扫描服务</div>
                    <div class="tips-info">漏洞扫描服务（Vulnerability Scan Service）在业务开发阶段进行编码安全检查，业务发布阶段进行ECS主机、数据库、Web漏洞、业务逻辑漏洞、弱密码、安全基线检测，业务运维阶段定时进行安全监测和巡检，扫描覆盖到业务全生命周期，满足合规要求，让安全弱点无所遁形</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md hss"></span>
                    </i>
                    <div class="tips-title">企业主机安全</div>
                    <div class="tips-info">企业主机安全（Host Security Service）是提升主机整体安全性的服务，提供资产管理、漏洞管理、入侵检测、基线检查等功能，帮助企业降低主机安全风险</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md dew"></span>
                    </i>
                    <div class="tips-title">数据加密服务</div>
                    <div class="tips-info">数据加密服务（Data Encryption Workshop）是一个综合的云上数据加密服务。它可以提供专属加密、密钥管理、密钥对管理等功能。其密钥由硬件安全模块（HSM） 保护，并与许多华为云服务集成。用户也可以借此服务开发自己的加密应用</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md dbss"></span>
                    </i>
                    <div class="tips-title">数据库安全服务</div>
                    <div class="tips-info">数据库安全服务（Database Security Service）是一个智能的数据库安全防护服务，基于反向代理及机器学习机制，提供敏感数据发现、数据脱敏、数据库审计和防注入攻击等功能，保障云上数据库的安全</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md ses"></span>
                    </i>
                    <div class="tips-title">安全专家服务</div>
                    <div class="tips-info">安全专家服务是华为与第三方权威机构一起为客户提供的“专家式”人工服务，帮助客户预防、监测、发现主机、站点及系统的安全风险，给出解决方案、整改建议及权威报告，并及时修复被攻击系统，降低损失。此外，还可以提供等保安全等服务</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md ssa"></span>
                    </i>
                    <div class="tips-title">态势感知</div>
                    <div class="tips-info">态势感知（Situation Awareness）为用户提供统一的威胁检测和风险处置平台。态势感知能够帮助用户检测云上资产遭受到的各种典型安全风险，还原攻击历史，感知攻击现状，预测攻击态势，为用户提供强大的事前、事中、事后安全管理能力</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md scm"></span>
                    </i>
                    <div class="tips-title">SSL证书管理</div>
                    <div class="tips-info">SSL证书管理（SSL Certificate Manager）是华为联合全球知名数字证书服务机构，为您提供一站式证书的全生命周期管理，实现网站的可信身份认证与安全数据传输</div>
                </a>

            </div>

            <div class="tips col-sm-4">

                <a href="#">
                    <i class="inco">
                        <span class="icons-product-md cbh"></span>
                    </i>
                    <div class="tips-title">云堡垒机</div>
                    <div class="tips-info">云堡垒机（Cloud Bastion Host），集华为多年安全和运维经验，满足合规需求；支持主流运维协议，可批量管理多台云主机和设备，不限并发；实时记录操作和日志流，方便审计</div>
                </a>

            </div>

        </div>
    </div>

</div>
</body>
</html>