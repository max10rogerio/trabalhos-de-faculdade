/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Models;

import java.util.List;
import javax.swing.JOptionPane;
import org.hibernate.Query;
import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.cfg.Configuration;

/**
 *
 * @author Kin
 */
public class ProdutosCRUD {

    /**
     * @param produto
     * @param args the command line arguments
     */
    public static void Cadastrar(Produtos produto) {
        SessionFactory sessionFactory = new Configuration().configure().buildSessionFactory();
        Session session = sessionFactory.openSession();
        try {
            session.beginTransaction();
            session.saveOrUpdate(produto);
            session.getTransaction().commit();

        } catch (Exception e) {
            JOptionPane.showMessageDialog(null, e);
        }
        session.close();

    }

    public static List Listar() {
        SessionFactory sessionFactory = new Configuration().configure().buildSessionFactory();
        Session session = sessionFactory.openSession();
        session.beginTransaction();

        Query queryResult = session.createQuery("from Produtos");
        List todosProdutos;
        todosProdutos = queryResult.list();
        for (int i = 0; i < todosProdutos.size(); i++) {
            Produtos produto = (Produtos) todosProdutos.get(i);
        }
        session.flush();
        session.close();
        return todosProdutos;

    }

    public static Produtos ListarId(int id) {
        Produtos produto = new Produtos();
        SessionFactory sessionFactory = new Configuration().configure().buildSessionFactory();
        Session session = sessionFactory.openSession();
        session.beginTransaction();
        Query queryResult = session.createQuery("FROM Produtos WHERE id = :id");
        queryResult.setInteger("id", id);
        produto = (Produtos) queryResult.uniqueResult();
        session.flush();
        session.close();
        return produto;

    }

    public static void Deletar(int id) {
        SessionFactory sessionFactory = new Configuration().configure().buildSessionFactory();
        Session session = sessionFactory.openSession();
        session.beginTransaction();
        Produtos produto = (Produtos) session.load(Produtos.class, id);
        session.delete(produto);
        session.getTransaction().commit();
        session.flush();
        session.close();
    }

    public static void Update(Produtos produto) {
        SessionFactory sessionFactory = new Configuration().configure().buildSessionFactory();
        Session session = sessionFactory.openSession();
        session.beginTransaction();
        session.update(produto);
        session.getTransaction().commit();
        session.flush();
        session.close();

    }

}
