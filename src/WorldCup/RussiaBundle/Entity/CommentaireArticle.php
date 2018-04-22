<?php

namespace WorldCup\RussiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommentaireArticle
 *
 * @ORM\Table(name="commentaire_article")
 * @ORM\Entity(repositoryClass="WorldCup\RussiaBundle\Repository\CommentaireArticleRepository")
 */
class CommentaireArticle
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="WorldCup\RussiaBundle\Entity\Article", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=700)
     */
    private $contenu;

    /**
     * @ORM\ManyToOne(targetEntity="WorldCup\RussiaBundle\Entity\User", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set article
     *
     * @param integer $article
     *
     * @return CommentaireArticle
     */
    public function setArticle($article)
    {
        $this->article = $article;
    
        return $this;
    }

    /**
     * Get article
     *
     * @return integer
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return CommentaireArticle
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    
        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set user
     *
     * @param integer $user
     *
     * @return CommentaireArticle
     */
    public function setUser($user)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return integer
     */
    public function getUser()
    {
        return $this->user;
    }
}

