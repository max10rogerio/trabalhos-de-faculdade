/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Persistencia;

import java.util.ArrayList;
import java.util.List;
import org.hibernate.Query;
import org.hibernate.Session;

/**
 *
 * @author max-desktop
 */
public class Generics implements IRepository{
    
    @Override
    public void save(Object o) {
        Session s = HibernateUtil.getSessionFactory().openSession();        
        s.getTransaction().begin();        
        s.saveOrUpdate(o);     
        s.getTransaction().commit();
        s.close();        
    }

    @Override
    public void update(Object o) {
        Session s = HibernateUtil.getSessionFactory().openSession();        
        s.getTransaction().begin();        
        s.saveOrUpdate(o);     
        s.getTransaction().commit();
        s.close();        
    }

    @Override
    public void delete(Object o) {
        Session s = HibernateUtil.getSessionFactory().openSession();        
        s.getTransaction().begin();        
        s.delete(o);     
        s.getTransaction().commit();
        s.close();  
    }

    @Override
    public Object getById(int id, String table) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    public ArrayList getAll(String table) {
        Session s = HibernateUtil.getSessionFactory().openSession();        
        s.getTransaction().begin(); 
        Query query = s.createQuery("FROM "+table);
        List lista = query.list();        
        s.getTransaction().commit();
        s.close();        
        return  new ArrayList(lista);
    }

}
