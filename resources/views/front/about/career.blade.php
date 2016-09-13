@extends('layout.main')
@section('title')
{!! $category->title or '' !!} - 关于我们 - 天眼投
@stop

@section('content')
<!--BODY START-->
<div id="aboutpage" class="wrap">
    <div class="container">
        @include('front.about.sidebar')
        <div class="main tworow">
            <h2>招贤纳士</h2>
            <div class="content join">
                <p class="join-para">
                    <img src="//static.touzhijia.com/images/about/joinus.jpg?ver=20160431006">

                    我们需要勇往直前的开拓者，需要精益求精的坚守者。如果你肯创新，有冲劲，肯拼搏，有自信，那请搭上“投之家”的快船，成就你的梦想，欢迎加入我们的团队！<br/>
                    我们将为你提供优厚福利 ：<br/>
                    五天八小时的工作制，极富同业竞争性的薪酬体系； <br/>
                    入职享有社保和公积金（综合医疗）；<br/>
                    顶级VC赛富亚洲和创东方B轮融资；<br/>
                    不用打卡，来去自由；<br/>
                    不考核，自由发挥 。<br/>      <span class="hight-light">请发送你的简历到：<a href="mailto:hr@touzhijia.com">hr@touzhijia.com</a>，投递时请注明申请职位。</span>
                </p>
                <table class="table table-blue" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <td class="title-position" width="220">招聘职位</td>
                        <td width="90">学历</td>
                        <td width="170">经验</td>
                        <td width="240">薪资范围</td>
                        <td width="140">职位要求</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="5">
                            <ul class="first-menu">
                                <li>
                                    <h3>
                                        <ul>
                                            <li class="position">前端开发工程师</li>
                                            <li class="edu">本科</li>
                                            <li class="exp">3~5年</li>
                                            <li class="validity">14k~28k</li>
                                            <li class="detail">详细<i class="iconfont arrow"></i></li>
                                        </ul>
                                    </h3>
                                    <p class="second-menu">
                                        <b>岗位职责：</b><br/>
                                        1、参与制定网站前端结构和解决方案；<br/>
                                        2、负责将UI设计图转变成Html页面，以及相关模块的呈现效果实现；<br/>
                                        3、与后台开发工程师协作，完成各种数据交互、动态信息展现和用户的互动；<br/>
                                        4、定期分享自己经验给团队成员，定期消灭零食，大家一起成长（变成胖子）；<br/>
                                        5、最后你要具备处女座的精神，不断对用户体验和前端方案提出优化建议。<br/>
                                        <br/>
                                        <b>职位要求：</b><br/>
                                        1、3-5年以上Web开发经验；<br/>
                                        2、熟悉各种Web前端技术、深刻理解Web标准，对浏览器(PC/Mobile)兼容性问题有丰富经验；<br/>
                                        3、对可用性、可访问性等相关知识有实际的了解和实践经验，致力于通过技术提高用户体验；<br/>
                                        4、积极主动的特质和思维习惯，优秀的团队协作意识。<br/></p>
                                </li>
                                <li>
                                    <h3>
                                        <ul>
                                            <li class="position">高级PHP开发工程师</li>
                                            <li class="edu">本科</li>
                                            <li class="exp">3~5年</li>
                                            <li class="validity">15K-25K</li>
                                            <li class="detail">详细<i class="iconfont arrow"></i></li>
                                        </ul>
                                    </h3>
                                    <p class="second-menu">
                                        <b>岗位职责：</b><br/>
                                        1、负责投之家的互联网产品研发工作；<br/>
                                        2、参与系统的需求分析、设计、编码等开发工作；<br/>
                                        3、负责相关系统的运营和维护工作，保证系统稳定可靠运行；<br/>
                                        4、负责消灭零食，负责拦截公司萌妹子不被别人追走，第4点格外突出者其他要求适当放宽啦！ <br/>
                                        <br/>
                                        <b>职位要求：</b><br/>
                                        1、除了生活自理独立以外，你还需要能够独立编写中等规模PHP应用程序，2年以上经验最好啦！<br/>
                                        2、不能只熟悉草榴网站啊，还要熟悉常见开放框架，熟悉DIV+CSS、Javascript、AJAX等前端技术，熟练掌握PHP+MYSQL编程才可以！<br/>
                                        3、生活上有早睡早起的好习惯，工作上必须拥有良好的代码习惯，要求结构清晰，命名规范，逻辑性强，代码冗余率低，让代码看起来帅帅哒~<br/>
                                        4、至于熟悉关系型数据库SQL语言，熟悉MYSQL数据库开发、配置、维护、性能优化，熟练应用SVN/Git进行协作开发，有撰写设计文档的习惯，有团队开发经验等等这些要是有就更好了~<br/></p>
                                </li>
                                <li>
                                    <h3>
                                        <ul>
                                            <li class="position">PHP开发工程师</li>
                                            <li class="edu">本科</li>
                                            <li class="exp">1~3年</li>
                                            <li class="validity">15k~20k</li>
                                            <li class="detail">详细<i class="iconfont arrow"></i></li>
                                        </ul>
                                    </h3>
                                    <p class="second-menu">
                                        <b>岗位职责：</b><br/>
                                        1、负责投之家的互联网产品研发工作；<br/>
                                        2、参与系统的需求分析、设计、编码等开发工作；<br/>
                                        3、负责相关系统的运营和维护工作，保证系统稳定可靠运行；<br/>
                                        4、负责消灭零食，负责拦截公司萌妹子不被别人追走，第4点格外突出者其他要求适当放宽啦！ <br/>
                                        <br/>
                                        <b>职位要求：</b><br/>
                                        1、除了生活自理独立以外，你还需要能够独立编写中等规模PHP应用程序，2年以上经验最好啦！<br/>
                                        2、不能只熟悉草榴网站啊，还要熟悉常见开放框架，熟悉DIV+CSS、Javascript、AJAX等前端技术，熟练掌握PHP+MYSQL编程才可以！<br/>
                                        3、生活上有早睡早起的好习惯，工作上必须拥有良好的代码习惯，要求结构清晰，命名规范，逻辑性强，代码冗余率低，让代码看起来帅帅哒~<br/>
                                        4、至于熟悉关系型数据库SQL语言，熟悉MYSQL数据库开发、配置、维护、性能优化，熟练应用SVN/Git进行协作开发，有撰写设计文档的习惯，有团队开发经验等等这些要是有就更好了~<br/>
                                    </p>
                                </li>
                                <li>
                                    <h3>
                                        <ul>
                                            <li class="position">高级JAVA开发工程师</li>
                                            <li class="edu">本科</li>
                                            <li class="exp">3-5年</li>
                                            <li class="validity">12k~18k</li>
                                            <li class="detail">详细<i class="iconfont arrow"></i></li>
                                        </ul>
                                    </h3>
                                    <p class="second-menu">
                                        <b>岗位职责：</b><br/>
                                        1、负责投之家的互联网产品研发工作；<br/>
                                        2、参与系统的需求分析、设计、编码等开发工作；<br/>
                                        3、负责相关系统的运营和维护工作，保证系统稳定可靠运行。<br/>
                                        4、负责消灭零食，负责拦截公司萌妹子不被别人追走，如果这项技能格外突出，其他要求可适当放宽啦，就是这么没原则！<br/>
                                        <br/>
                                        <b>任职要求：</b><br/>
                                        1、最好和JAVA谈过三年的恋爱，有一定的‘恋爱’经验<br/>
                                        2、在恋爱期间，你要精通SpringMVC/Spring，FreeMarker，Hybernate/Ibatis，JavaWebService等各种泡妹子技能<br/>
                                        3、还要有html/css/JavaScript、jQuery等杀手锏技能<br/>
                                        4、如果你精通常用java开源技术，熟练使用redis、svn，熟悉linux、nginx，lucene/solr，哪个妹子不爱呢？<br/>
                                        5、如果你熟练使用Mysql/Oracle，精通SQL语言,熟练编写高效sql与sql优化，别说妹子，汉子都为你倾倒啦<br/>
                                        6、对互联网这个‘丈母娘’有深刻的认识和交锋，如果你有并发编程的项目经验、熟悉scala，go那就更好了<br/>
                                    </p>
                                </li>
                                <li>
                                    <h3>
                                        <ul>
                                            <li class="position">iOS开发工程师</li>
                                            <li class="edu">本科</li>
                                            <li class="exp">1~3年</li>
                                            <li class="validity">10k~15k</li>
                                            <li class="detail">详细<i class="iconfont arrow"></i></li>
                                        </ul>
                                    </h3>
                                    <p class="second-menu">
                                        <b>岗位职责：</b><br/>
                                        1、ios系统app的开发与维护（门户、社区类app）；<br/>
                                        2、根据需要协助测试人员完成测试环境的搭建，参与测试方案的制定以及测试用例的评审。<br/>
                                        <br/>
                                        <b>任职要求：</b><br/>
                                        1、熟练使用objective-c，具有良好的c/c  语言基础，掌握iphone sdk相关技术开发及应用；<br/>
                                        2、熟悉ios下的多线程开发、网络通信、内存管理、gui开发，熟悉产品发布流程；<br/>
                                        3、熟悉http协议，熟悉socket通信；<br/>
                                        4、对ios内存管理模型有清晰的认识，了解mrc和arc，以及block环境下的内存管理规。<br/>
                                    </p>
                                </li>
                                <li>
                                    <h3>
                                        <ul>
                                            <li class="position">Android开发工程师</li>
                                            <li class="edu">本科</li>
                                            <li class="exp">1~3年</li>
                                            <li class="validity">10k~15k</li>
                                            <li class="detail">详细<i class="iconfont arrow"></i></li>
                                        </ul>
                                    </h3>
                                    <p class="second-menu">
                                        <b>岗位职责：</b><br/>
                                        1、负责移动平台android的应用开发；<br/>
                                        2、参与产品需求分析并参与技术实施方案设计；<br/>
                                        3、参与对手机软件产品进行维护和持续升级；<br/>
                                        4、学习和研究新的移动互联网技术以满足产品需求。<br/>
                                        <br/>
                                        <b>任职要求：</b><br/>
                                        1、熟悉android系统构架,android软件开发具备良好的java技术功底；3年以上android开发经验；<br/>
                                        2、精通网络异步应用的开发模式，熟悉网络通信机制，对socket、tcp和http有较深刻的理解和经验，了解3g/wifi技术；<br/>
                                        3、精通android常用的ui布局、自定义控件、特效开发；<br/>
                                        4、熟悉消息机制和进程间通信机制；<br/>
                                        5、熟悉版本管理系统svn的使用；<br/>
                                        6、有较强的沟通、逻辑分析和独立解决问题的能力；<br/>
                                        7、有钻研新技术的热情和能力。<br/>
                                        <br/>
                                        <b>优先条件：</b><br/>
                                        1、熟悉多线程编程等技术开发；<br/>
                                        2、有相关开发经验<br/>
                                    </p>
                                </li>
                                <li>
                                    <h3>
                                        <ul>
                                            <li class="position">技术运维工程师</li>
                                            <li class="edu">本科</li>
                                            <li class="exp">1年以上</li>
                                            <li class="validity">5k~8k</li>
                                            <li class="detail">详细<i class="iconfont arrow"></i></li>
                                        </ul>
                                    </h3>
                                    <p class="second-menu">
                                        <b>岗位职责：</b><br/>
                                        1、客户桌面、机房布线安装、变更、维护、故障排除；<br/>
                                        2、日常布线维护，技术支持；<br/>
                                        3、运营维护，技术支持，文档的整理维护；<br/>
                                        4、IT设备的安装、配置、故障排除；<br/>
                                        5、良好的团队合作精神，较强的沟通、协调能力，有激情。<br/>
                                        <br/>
                                        <b>任职要求：</b><br/>
                                        1、计算机、网络、信息类专业；<br/>
                                        2、有综合布线安装施工经验的优先；<br/>
                                        3、具有较强的沟通及组织协调能力、学习能力及较强的团队合作精神。<br/>
                                    </p>
                                </li>
                                <li>
                                    <h3>
                                        <ul>
                                            <li class="position">高级产品经理</li>
                                            <li class="edu">本科</li>
                                            <li class="exp">5年以上</li>
                                            <li class="validity">15K~20K</li>
                                            <li class="detail">详细<i class="iconfont arrow"></i></li>
                                        </ul>
                                    </h3>
                                    <p class="second-menu">
                                        <b>岗位职责：</b><br/>
                                        1、 产品的规划和设计：根据公司战略和业务定位，捕捉和分析用户需求并提炼产品功能、策划产品原型，撰写详细的产品需求文档；<br/>
                                        2、产品上线项目管理：与开发、测试、运营等环节有效沟通，确保其对产品充分理解，推动产品上线运行；<br/>
                                        3、产品迭代和优化：负责监控产品数据，作出统计和分析，提出并组织实施产品迭代与更新方案；<br/>
                                        4、制定产品阶段目标，关键KPI，针对产品运营数据分析并制定改进方案，对结果负责。<br/>
                                        <br/>
                                        <b>岗位要求：</b><br/>
                                        1、本科及以上学历，金融学、经济学等相关专业，211/985高校毕业生优先考虑；<br/>
                                        2、3年以上互联网产品工作经验，至少独立负责过1个产品的完整生命周期（包括设计和运营）；<br/>
                                        3、产品架构设计能力、熟练使用产品设计工具，撰写产品设计文档，设计页面原型；<br/>
                                        4、对数据敏感，优秀的数据统计分析能力，能从数据中发现问题并提供解决方案；<br/>
                                        5、有金融行业、财经等相关行业相关背景者优先；<br/>
                                        6、思路清晰，逻辑分析能力强，沟通、协调、组织能力好；<br/>
                                        7、有较强责任心与团队精神，较强的抗压能力。<br/>
                                    </p>
                                </li>
                                <li>
                                    <h3>
                                        <ul>
                                            <li class="position">产品经理</li>
                                            <li class="edu">本科</li>
                                            <li class="exp">3~5年</li>
                                            <li class="validity">10k~20k</li>
                                            <li class="detail">详细<i class="iconfont arrow"></i></li>
                                        </ul>
                                    </h3>
                                    <p class="second-menu">
                                        <b>岗位职责：</b><br/>
                                        1、 产品的规划和设计：根据公司战略和业务定位，捕捉和分析用户需求并提炼产品功能、策划产品原型，撰写详细的产品需求文档；<br/>
                                        2、产品上线项目管理：与开发、测试、运营等环节有效沟通，确保其对产品充分理解，推动产品上线运行；<br/>
                                        3、产品迭代和优化：负责监控产品数据，作出统计和分析，提出并组织实施产品迭代与更新方案；<br/>
                                        4、制定产品阶段目标，关键KPI，针对产品运营数据分析并制定改进方案，对结果负责。<br/>
                                        <br/>
                                        <b>岗位要求：</b><br/>
                                        1、本科及以上学历，金融学、经济学等相关专业，211/985高校毕业生优先考虑；<br/>
                                        2、3年以上互联网产品工作经验，至少独立负责过1个产品的完整生命周期（包括设计和运营）；<br/>
                                        3、产品架构设计能力、熟练使用产品设计工具，撰写产品设计文档，设计页面原型；<br/>
                                        4、对数据敏感，优秀的数据统计分析能力，能从数据中发现问题并提供解决方案；<br/>
                                        5、有金融行业、财经等相关行业相关背景者优先；<br/>
                                        6、思路清晰，逻辑分析能力强，沟通、协调、组织能力好；<br/>
                                        7、有较强责任心与团队精神，较强的抗压能力。<br/>
                                    </p>
                                </li>
                                <li>
                                    <h3>
                                        <ul>
                                            <li class="position">微信运营</li>
                                            <li class="edu">本科</li>
                                            <li class="exp">1~3年</li>
                                            <li class="validity">5k~10k</li>
                                            <li class="detail">详细<i class="iconfont arrow"></i></li>
                                        </ul>
                                    </h3>
                                    <p class="second-menu">
                                        <b>岗位职责：</b><br/>
                                        1、负责微信公众平台的日常运营管理、信息发布与维护，提高产品信息的传播量，提高产品在目标客户群中的知名度，提升销售额；<br/>
                                        2、制定和执行微信公众号的推广计划，对粉丝保持高度关注度，带动粉丝数量增长，增加公众号的影响力；<br/>
                                        3、跟踪微信推广效果，分析数据并反馈，掌握了解成功行业微信运营手法，综合提升公司推广能力；<br/>
                                        4、深入了解互联网，尤其是微信特点及资源，有效运用相关资源。<br/>
                                        <br/>
                                        <b>任职要求：</b><br/>
                                        1、要求本科以上学历，1年以上微信管理经验，有成功的微信营销案例或相关微信号运营经验者优先；<br/>
                                        2、熟悉微信各项应用，对微信运营方式和推广手段有深入了解；<br/>
                                        3、有较强的文案创作和文档编写能力，熟练操作Word、Excel、PPT办公软件，一定程度掌握图片处理软件；<br/>
                                        4、具有强烈的责任心，具有独立思考能力和积极的工作态度，具有良好的团队精神和服务意识，具备较强的沟通能力。<br/>
                                    </p>
                                </li>
                                <li>
                                    <h3>
                                        <ul>
                                            <li class="position">财经编辑</li>
                                            <li class="edu">本科</li>
                                            <li class="exp">1~3年</li>
                                            <li class="validity">5k~7k</li>
                                            <li class="detail">详细<i class="iconfont arrow"></i></li>
                                        </ul>
                                    </h3>
                                    <p class="second-menu">
                                        <b>岗位职责：</b><br/>
                                        1、负责公司金融领域的选题策划、撰稿，金融类专题策划、专题制作、专题执行；<br/>
                                        2、收集编辑和整理和发布优质财经新闻和文章；<br/>
                                        3、策划具有独立观点的财经相关专题；<br/>
                                        4、跟踪财经资讯，对重大信息和事件进行专业报道；<br/>
                                        5、对投资领域信息保持关注，保持动态跟踪，掌握最新进展。<br/>
                                        <br/>
                                        <b>职位要求：</b><br/>
                                        1、经济、金融、新闻等相关专业，本科及以上学历；<br/>
                                        2、口头表达能力优秀，对编辑类工作有浓厚的兴趣与出色的执行力；<br/>
                                        3、两年以上相关工作经验，有财经资讯类网站编辑工作经验者优先。文字功底扎实，有敏锐的财经直觉；<br/>
                                        4、具有较好财经基础知识储备，对政经、金融、企业、产业、青创类新闻具有较强的敏感性，了解国内外经济形势及经济热点，能够独立完成观点类文章或具有详尽分析的数据说明类文章。<br/>
                                    </p>
                                </li>
                                <li>
                                    <h3>
                                        <ul>
                                            <li class="position">理财顾问(外呼)</li>
                                            <li class="edu">本科</li>
                                            <li class="exp">1~3年</li>
                                            <li class="validity">4k~8k</li>
                                            <li class="detail">详细<i class="iconfont arrow"></i></li>
                                        </ul>
                                    </h3>
                                    <p class="second-menu">
                                        <b>工作目标：</b><br/>
                                        通过本职位的工作，向客户提供专业、优质、及时、全面的咨询服务，提升公司信誉，扩大公司在同行业中的竞争力。<br/>
                                        <br/>
                                        <b>工作原则：</b><br/>
                                        尊重客户，礼貌真诚的对待客户，耐心听取客户意见，及时为客户解决疑问。<br/>
                                        <br/>
                                        <b>工作职责：</b><br/>
                                        1、负责搜集潜在用户的信息，并通过电话、即时通讯工具、邮件等方式向客户确认需
                                        求，并推荐公司产品，及提供周到的后续服务。<br/>
                                        2、通过电话、邮件等方式的回访，并进一步向其推广公司的增值服务，以提升公司销售业绩。<br/>
                                        3、负责接受客户投诉，并跟进内部处理进度，极力提升用户满意度。<br/>
                                        4、在客服工作过程中，有效发掘潜在用户，及时发现客户存在的各类问题并提交关联
                                        部门予以改善优化。<br/>
                                        <br/>
                                        <b>职业素质要求：</b><br/>
                                        1、具备良好的客户服务意识和综合素质；<br/>
                                        2、具备良好的沟通技巧与协调能力；<br/>
                                        3、具有良好的团队合作意识；<br/>
                                        4、具备良好的情绪控制能力和心态调节能力。<br/>
                                    </p>
                                </li>
                                <li>
                                    <h3>
                                        <ul>
                                            <li class="position">ASO</li>
                                            <li class="edu">本科</li>
                                            <li class="exp">3~5年</li>
                                            <li class="validity">8K~16K</li>
                                            <li class="detail">详细<i class="iconfont arrow"></i></li>
                                        </ul>
                                    </h3>
                                    <p class="second-menu">
                                        <b>岗位职责： </b><br/>
                                        1、投之家产品AppStore及主要安卓商店的ASO工作，时刻关注主要应用商店排名算法变化；<br/>
                                        2、根据安卓和IOS的市场运营状况，分析运营数据、制定应对方案；<br/>
                                        3、负责公司APP在各大Android应用商店、App Store等各类渠道的发布、管理工作；<br/>
                                        4、负责公司网站在PC端及移动端的SEO工作，关注主要搜索引擎算法变化，制定相应SEO方案。<br/>
                                        <br/>
                                        <b>任职要求：</b><br/>
                                        1、本科学历，3年以上互联网平台运营实操及管理经验；有成功案例；<br/>
                                        2、熟悉网站架构和执行流程，熟悉网站运营管理结构和流程，对金融行业有较深了解者优先； <br/>
                                        3、有丰富的互联网运营策划和市场推广营销经验； <br/>
                                        4、具有良好的沟通能力、团队合作力和自我激励能力。<br/>
                                    </p>
                                </li>
                                <li>
                                    <h3>
                                        <ul>
                                            <li class="position">BD专员</li>
                                            <li class="edu">专科</li>
                                            <li class="exp">1~3年</li>
                                            <li class="validity">5k~9k</li>
                                            <li class="detail">详细<i class="iconfont arrow"></i></li>
                                        </ul>
                                    </h3>
                                    <p class="second-menu">
                                        <b岗位职责:</b><br/>
                                        1、根据公司的业务目标，制定有效渠道拓展计划并实施；<br/>
                                        2、结合公司发展方向，寻找各类优质渠道、行业展开资源合作，商务合作；<br/>
                                        3、制定针对不同类型合作伙伴的合作方案并洽谈持续优化渠道效果，提高渠道ROI；<br/>
                                        4、结合互联网金融用户画像及渠道特性，策划有效的推广方案；<br/>
                                        5、独立完成商务谈判，并维护商务合作关系；<br/>
                                        6、与业务相关部门沟通，推动方案的落地。<br/>
                                        <br/>
                                        <b>任职要求：</b><br/>
                                        1、大专及以上学历，电子商务、计算机和市场营销等专业优先；<br/>
                                        2、1年以上BD工作经验，支付类、电商或者金融等相关行业经验优先；<br/>
                                        3、能进行商务谈判及客户管理、商业合作方案撰写及演示；<br/>
                                        4、熟悉互联网及电子商务网站的运作模式，有较强市场资源拓展能力；<br/>
                                        5、良好的沟通及活动策划能力；<br/>
                                        6、资源人脉丰富，目标感强，谈判能力强，有一定的项目管理能力；<br/>
                                    </p>
                                </li>
                                <li>
                                    <h3>
                                        <ul>
                                            <li class="position">销售助理</li>
                                            <li class="edu">专科</li>
                                            <li class="exp">1~3年</li>
                                            <li class="validity">8k~10k</li>
                                            <li class="detail">详细<i class="iconfont arrow"></i></li>
                                        </ul>
                                    </h3>
                                    <p class="second-menu">
                                        <b>岗位职责：</b><br/>
                                        1. 工作时间内及时完成邮件的处理，提供良好的售前售后服务；<br/>
                                        2. 协助销售进行售前资料收集、售后资源落地执行；<br/>
                                        3. 收集和整理客户的反馈信息，反馈给相关主管人员；<br/>
                                        4.根据事情的轻重缓急完成相关工作及资料归档。<br/>
                                        <br/>
                                        <b>任职要求：</b><br/>
                                        1、熟悉互联网，能熟练使用网络交流工具和各种办公软件；<br/>
                                        2、诚实可信,稳重,耐心，要求责任心强，有良好的执行力和团队合作精神；<br/>
                                        3、具备优秀的沟通技巧、表达技巧，普通话标准流利；<br/>
                                        4、富有开拓精神和良好的团队合作意识，有很强的学习和沟通能力；<br/>
                                        5．有一定互联网概念，热爱并愿意在互联网金融领域展示发展自己。<br/>
                                    </p>
                                </li>
                                <li>
                                    <h3>
                                        <ul>
                                            <li class="position">金融业务总监</li>
                                            <li class="edu">本科</li>
                                            <li class="exp">8年以上</li>
                                            <li class="validity">15K~25K</li>
                                            <li class="detail">详细<i class="iconfont arrow"></i></li>
                                        </ul>
                                    </h3>
                                    <p class="second-menu">
                                        <b>岗位职责：</b><br/>
                                        1、负责金融机构业务合作，包括保险/银行/信托/基金/证券/VC/PE等；<br/>
                                        2、负责团队的业务运作，业绩考核和日常管理；<br/>
                                        3、负责并指导团队完成业绩指标并拓展业务渠道，带领团队有效开拓新业务，建立广泛的合作渠道；<br/>
                                        4、指导团队有效甄别项目风险，项目谈判，价值分析，业务模式等；<br/>
                                        5、科学管理，有效激励团队业务开展，指导团队业务操作，控制团队业务风险。<br/>
                                        <br/>
                                        <b>任职要求：</b><br/>
                                        1、本科或以上学历，金融、经济、市场营销、管理相关专业，硕士优先；<br/>
                                        2、5年以上工作经验，有保险/银行/信托/基金/证券/VC/PE的营销推广、渠道合作、市场调研经验；<br/>
                                        3、熟悉国家相关宏观金融政策，熟悉金融市场和产品，具备总体和长远的业务发展思路、及具体项目的组织实施与风险识别能力，卓越的沟通协调、应急处理、学习创新、团队管理能力；<br/>
                                        4、性格特质：思维敏捷，逻辑清晰，积极主动，响应迅速，目标意识强。<br/>
                                    </p>
                                </li>
                                <li>
                                    <h3>
                                        <ul>
                                            <li class="position">金融资产拓展经理</li>
                                            <li class="edu">本科</li>
                                            <li class="exp">3~5年</li>
                                            <li class="validity">10k~15k</li>
                                            <li class="detail">详细<i class="iconfont arrow"></i></li>
                                        </ul>
                                    </h3>
                                    <p class="second-menu">
                                        <b>岗位职责:</b><br/>
                                        1、开拓资产端市场，寻找优质金融资产项目，对接到公司业务平台中来；<br/>
                                        2、负责运作项目：评估、立项、尽职调查、谈判、交易、退出等，并协助参与被投项目的投后管理；<br/>
                                        3、起草或协助撰写尽职调查报告、可行性分析报告、投资报告等，同时和各种资产端项目对接；<br/>
                                        4、在投资项目实施过程中，指导并监控项目的实际操作，通过各项风险控制、投资决策流程，按决策结果与被投项目进行商务谈判与实施；<br/>
                                        <br/>
                                        <b>任职要求：</b><br/>
                                        1、重点大学本科以上学历优先；<br/>
                                        2、3年以上工作经验，熟悉并热爱金融、投资行业；有P2P网贷领域的资产端投资经验者优先；<br/>
                                        4、强烈的责任心，细心，耐心，有毅力，有创新精神，合作精神。<br/>
                                    </p>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--BODY END-->
@stop

@section('script')
    @include('front.about.script')
@stop