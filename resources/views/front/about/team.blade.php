@extends('layout.main')
@section('title')
    {!! $category->title or '' !!} - 关于我们 - 天眼投
@stop

@section('content')
<!--BODY START-->
<div id="aboutpage" class="wrap">
    <div class="container">
        @include('front.about.sidebar')
        <div class="main tworow team">
            <h2>团队介绍</h2>
            <div class="content">
                <div class="style-quote noborder" style="margin-bottom: 0;">
                    <i class="l-quote"></i>
                    <i class="r-quote"></i>
                    <p>天眼投的成长离不开众多投资人的肯定和支持，感谢你们一路的支持，让我们知道努力是值得的，在这里，之家哥和之家妹将不断的优化平台的至美体验。</p>
                </div>
                <img src="http://static.tianyantou.com/images/about/teams.jpg?ver=20160431006">
            </div>
            <div class="gradient-box">
                <h3>之家兄妹</h3>
                <div class="waterfull-wrap">
                    <ul class="waterfull">
                        <li>
                            <img src="http://static.tianyantou.com/images/about/team/team-11.png?ver=20160431006" width="202" height="196">
                            <div class="mask">
                                <h4>梁俊</h4>
                                <p>人生有梦，筑梦踏实</p>
                            </div>
                        </li>
                        <li>
                            <img src="http://static.tianyantou.com/images/about/team/team-01.jpg?ver=20160431006" width="202" height="220">
                            <div class="mask">
                                <h4>秦建平</h4>
                                <p>人生就是一个不断实现目标的过程，在实现目标的过程中，永不放弃。</p>
                            </div>
                        </li>
                        <li>
                            <img src="http://static.tianyantou.com/images/about/team/team-03.JPG?ver=20160431006" width="202" height="188">
                            <div class="mask">
                                <h4>丁雪</h4>
                                <p>生活就像逆水行舟，不进则退！</p>
                            </div>
                        </li>
                        <li>
                            <img src="http://static.tianyantou.com/images/about/team/team-04.jpg?ver=20160431006" width="202" height="268">
                            <div class="mask">
                                <h4>曹祠萍</h4>
                                <p>爱人，也爱己，爱上帝，也爱俗世人间</p>
                            </div>
                        </li>
                        <li>
                            <img src="http://static.tianyantou.com/images/about/team/team-05.jpg?ver=20160431006" width="202" height="284">
                            <div class="mask">
                                <h4>覃武权</h4>
                                <p>你所追求的平淡，其实是平庸。!</p>
                            </div>
                        </li>
                        <li>
                            <img src="http://static.tianyantou.com/images/about/team/team-02.jpg?ver=20160431006" width="202" height="269">
                            <div class="mask">
                                <h4>LETHE</h4>
                                <p>我们现在过得每一天，都是余生中最年轻的一天</p>
                            </div>
                        </li>
                        <li>
                            <img src="http://static.tianyantou.com/images/about/team/team-07.jpg?ver=20160431006" width="202" height="152">
                            <div class="mask">
                                <h4>邓伟</h4>
                                <p>海到无边天作岸，山登绝顶我为峰</p>
                            </div>
                        </li>
                        <li>
                            <img src="http://static.tianyantou.com/images/about/team/team-09.jpg?ver=20160431006" width="202" height="152">
                            <div class="mask">
                                <h4>李钰</h4>
                                <p>GOOD GOOD STUDY DAY DAY UP</p>
                            </div>
                        </li>
                        <li>
                            <img src="http://static.tianyantou.com/images/about/team/team-12.jpg?ver=20160431006" width="202" height="269">
                            <div class="mask">
                                <h4>王玉洁</h4>
                                <p>爱生活！爱健康！</p>
                            </div>
                        </li>
                        <li>
                            <img src="http://static.tianyantou.com/images/about/team/team-14.jpg?ver=20160431006" width="202" height="269">
                            <div class="mask">
                                <h4>珊珊</h4>
                                <p>愿自己成为自己的太阳，无需凭借谁的光</p>
                            </div>
                        </li>
                        <li>
                            <img src="http://static.tianyantou.com/images/about/team/team-15.jpg?ver=20160431006" width="202" height="202">
                            <div class="mask">
                                <h4>李苑</h4>
                                <p>岁数长了，但还是喜欢卖萌，因为我可爱，体重重了依旧喜欢美味，因为我是吃货，这就是我，人见人爱花见花开的苑苑</p>
                            </div>
                        </li>
                        <li>
                            <img src="http://static.tianyantou.com/images/about/team/team-20.jpg?ver=20160431006" width="202" height="304">
                            <div class="mask">
                                <h4>小辉辉</h4>
                                <p>看得淡一点，伤得就会少一点</p>
                            </div>
                        </li>
                        <li>
                            <img src="http://static.tianyantou.com/images/about/team/team-18.jpg?ver=20160431006" width="202" height="250">
                            <div class="mask">
                                <h4>吴彩艳</h4>
                                <p>无论今天发生多么糟糕的事，都不要对生活失望，因为还有明天</p>
                            </div>
                        </li>
                        <li>
                            <img src="http://static.tianyantou.com/images/about/team/team-06.jpg?ver=20160431006" width="202" height="299">
                            <div class="mask">
                                <h4>李锋</h4>
                                <p>催进度，需要好身体啊！</p>
                            </div>
                        </li>
                        <li>
                            <img src="http://static.tianyantou.com/images/about/team/team-21.jpg?ver=20160431006" width="202" height="152">
                            <div class="mask">
                                <h4>郭帅</h4>
                                <p>来不及解释快上车搞起来</p>
                            </div>
                        </li>
                        <li>
                            <img src="http://static.tianyantou.com/images/about/team/team-19.jpg?ver=20160431006" width="202" height="152">
                            <div class="mask">
                                <h4>聂文</h4>
                                <p>他，她，我，We are 伐木累!</p>
                            </div>
                        </li>
                        <li>
                            <img src="http://static.tianyantou.com/images/about/team/team-10.jpg?ver=20160431006" width="202" height="252">
                            <div class="mask">
                                <h4>周芳</h4>
                                <p>绚烂的烟火，才是不一样的自我。</p>
                            </div>
                        </li>
                        <li>
                            <img src="http://static.tianyantou.com/images/about/team/team-24.jpg?ver=20160431006" width="202" height="269">
                            <div class="mask">
                                <h4>李欣欣</h4>
                                <p>Work hard, and play hard!</p>
                            </div>
                        </li>
                        <li>
                            <img src="http://static.tianyantou.com/images/about/team/team-23.jpg?ver=20160431006" width="202" height="178">
                            <div class="mask">
                                <h4>黄莎莎</h4>
                                <p>真正的优秀不是自己比别人优秀，而是比昨天的自己更优秀</p>
                            </div>
                        </li>
                        <li>
                            <img src="http://static.tianyantou.com/images/about/team/team-22.JPG?ver=20160431006" width="202" height="202">
                            <div class="mask">
                                <h4>徐浩</h4>
                                <p>既然青春留不住，那就一个字：干！</p>
                            </div>
                        </li>
                        <li>
                            <img src="http://static.tianyantou.com/images/about/team/team-13.jpg?ver=20160431006" width="202" height="345">
                            <div class="mask">
                                <h4>刘雯婉</h4>
                                <p>路在脚下，幸福在路上，芬芳溢于幸福上，何怕无花香满径？</p>
                            </div>
                        </li>
                        <li>
                            <img src="http://static.tianyantou.com/images/about/team/team-17.jpg?ver=20160431006" width="202" height="356">
                            <div class="mask">
                                <h4>刘丽梅</h4>
                                <p>未经一番寒彻骨,焉得梅花扑鼻香</p>
                            </div>
                        </li>
                        <li>
                            <img src="http://static.tianyantou.com/images/about/team/team-08.jpg?ver=20160431006" width="202" height="301">
                            <div class="mask">
                                <h4>黄丽</h4>
                                <p>学习着，并快乐着，秀出缤纷的自己。</p>
                            </div>
                        </li>
                        <li>
                            <img src="http://static.tianyantou.com/images/about/team/team-16.JPG?ver=20160431006" width="202" height="310">
                            <div class="mask">
                                <h4>王康</h4>
                                <p>不扫一屋，何以扫天下</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="gradient-box">
                <h3>不一样的我们</h3>
                <p>小溪只能泛起小小的浪花，大海才能迸发出惊涛骇浪，在这里我们风雨同舟，共同奋进。</p>
                <img src="http://static.tianyantou.com/images/about/team-events.jpg?ver=20160431006">
            </div>
        </div>
    </div>
</div>
<!--BODY END-->
@stop

@section('script')
    @include('front.about.script')
@stop