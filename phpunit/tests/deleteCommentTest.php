<?php

use PHPUnit\Framework\TestCase;

class DeleteCommentTest extends TestCase {
    public function testToGetCommentId() 
    {
        $comment = new \Models\Comments;
        
        $comment->setCommentId(1);
        
        $this->assertEquals($comment->getCommentId(), 1);
    }
    
    public function testToDeleteComment() 
    {
        $comment = new \Models\Comments;
        
        $commentId = $comment->getCommentId();
        
        $this->assertEquals($comment->deleteComment($commentId), True);
    }
}